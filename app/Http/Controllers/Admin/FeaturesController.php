<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Image;

use App\Actions\Base64ToFilename;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\AdminStoreFeatureRequest;

use App\Transformers\Admin\FeaturesTransformer;


class FeaturesController extends Controller
{

    public function store(Request $request)
    {
        try {
          $feature = Feature::create($request->all());
          return response()->json($feature->toArray(), 201);
        } catch (\Exception $e) {
          Log::debug($e);
        }

    }

    public function destroy(Feature $feature)
    {
        $status = $feature->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Feature Deleted!' : 'Error Deleting Feature'
        ]);

    }
}
