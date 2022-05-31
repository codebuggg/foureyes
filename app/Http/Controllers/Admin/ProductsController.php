<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Image;
use App\Models\Feature;
use App\Models\Color;
use App\Models\ProductFeature;
use App\Models\ProductColor;

use App\Actions\Base64ToFilename;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\AdminStoreProductRequest;

use App\Transformers\Admin\ProductsTransformer;
use App\Transformers\Admin\ProductTransformer;

use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = fractal($products, new ProductsTransformer())->toArray();
        return response()->json($products);
    }

    public function create()
    {
      $features = Feature::all();
      $colors = Color::all();
      return response()->json([
        "colors" => $colors,
        "features" => $features,
      ]);
    }

    public function store(AdminStoreProductRequest $request, Base64ToFilename $base64)
    {
        try 
        {
            DB::beginTransaction();
          $product = Product::create($request->except(["file", "features", "colors"]));
          $image = $product->images()->create(["path" => $base64->execute($request)]);
          $features = [];
          foreach ($request->features as $key => $value) 
          {
              ProductFeature::create([
                  "product_id" => $product->id,
                  "feature_id" => $value,
              ]);
          }
          foreach ($request->colors as $key => $value) 
          {
            ProductColor::create([
                "product_id" => $product->id,
                "color_id" => $value,
            ]);
        }
            DB::commit();
          return response()->json("", 201);
        } catch (\Exception $e) 
        {
            Log::debug($e);
            DB::rollBack();
        }

    }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function edit(Product $product)
    {
        $product = fractal($product, new ProductTransformer())->toArray();
        $features = Feature::all();
        $colors = Color::all();
        return response()->json([
            "colors" => $colors,
            "features" => $features,
            "product" => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        try 
        {
            DB::beginTransaction();
            $product->update($request->except(["file", "features", "colors"]));
            $image = $product->images()->create(["path" => $base64->execute($request)]);
            $product->features()->delete();
            $product->colors()->delete();
            $features = [];
            foreach ($request->features as $key => $value) 
            {
                ProductFeature::create([
                    "product_id" => $product->id,
                    "feature_id" => $value,
                ]);
            }
            foreach ($request->colors as $key => $value) 
            {
                ProductColor::create([
                "product_id" => $product->id,
                "color_id" => $value,
                ]);
            }
            DB::commit();
            return response()->json("", 200);
        } catch (\Exception $e) 
        {
            Log::debug($e);
            DB::rollBack();
        }
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
