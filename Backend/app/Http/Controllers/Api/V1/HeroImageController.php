<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\HeroImage;
use App\Models\HeroImages;
use Illuminate\Http\Request;

class HeroImageController extends Controller
{
    public function index()
    {
        $heroImages = HeroImage::all();

        return response()->json([
            'message' => 'Hero images retrieved successfully',
            'data' => $heroImages,
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_content_id' => 'required|integer|min:1',
            'src' => 'required|url',
            'alt' => 'required|string|max:255',
        ]);

        $heroImage = HeroImage::create($data);

        return response()->json([
            'message' => 'Hero image created successfully',
            'data' => $heroImage,
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ], 201);
    }

    public function show($id)
    {
        $heroImage = HeroImage::find($id);

        if (!$heroImage) {
            return response()->json([
                'message' => 'Hero image not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Hero image retrieved successfully',
            'data' => $heroImage,
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
    }

    public function update(Request $request, $id)
    {
        $heroImage = HeroImage::find($id);

        if (!$heroImage) {
            return response()->json([
                'message' => 'Hero image not found'
            ], 404);
        }

        $data = $request->validate([
            'page_content_id' => 'sometimes|integer|min:1',
            'src' => 'sometimes|url',
            'alt' => 'sometimes|string|max:255',
        ]);

        $heroImage->update($data);

        return response()->json([
            'message' => 'Hero image updated successfully',
            'data' => $heroImage,
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
    }

    public function destroy($id)
    {
        $heroImage = HeroImage::find($id);

        if (!$heroImage) {
            return response()->json([
                'message' => 'Hero image not found'
            ], 404);
        }

        $heroImage->delete();

        return response()->json([
            'message' => 'Hero image deleted successfully',
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
    }
}
