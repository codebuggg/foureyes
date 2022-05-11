<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Image;

use App\Actions\Base64ToFilename;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\AdminStoreProductRequest;

use App\Transformers\Admin\ProductsTransformer;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = fractal($products, new ProductsTransformer())->toArray();
        return response()->json($products);
    }

    public function store(AdminStoreProductRequest $request, Base64ToFilename $base64)
    {
        try {
          //$params = $request->all();
          //$imageName = $params["image"]->getClientOriginalName();
          //$params["image"]->move(public_path('images'), $imageName);
          //$params["image"] = $imageName;
          $product = Product::create($request->all());
          $image = $product->images()->create(["path" => $base64->execute($request)]);
          return response()->json("", 201);

          /*return response()->json([
              'status' => (bool) $product,
              'data'   => $product,
              'message' => $product ? 'Product Created!' : 'Error Creating Product'
          ], 201);
          */
        } catch (\Exception $e) {
          Log::debug($e);
        }

    }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product)
    {
        $status = $product->update(
            $request->only(['name', 'description', 'units', 'price', 'image'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Updated!' : 'Error Updating Product'
        ]);
    }

    public function units(Request $request, Product $product)
    {
        $product->units += $request->get('units');
        $status = $product->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Units Added!' : 'Error Adding Product Units'
        ]);
    }

    public function destroy(Product $product)
    {
        $status = $product->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Deleted!' : 'Error Deleting Product'
        ]);

    }
}
