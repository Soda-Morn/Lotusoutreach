<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\HeroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroImageController extends Controller
{
    public function index()
    {
        $heroImages = HeroImage::all();

        // Map images to include full image URL
        $heroImagesWithUrl = $heroImages->map(function ($image) {
            return [
                'id' => $image->id,
                'page_content_id' => $image->page_content_id,
                'src' => $image->src,
                'alt' => $image->alt,
                'image_url' => asset('storage/' . $image->src),
                'created_at' => $image->created_at,
                'updated_at' => $image->updated_at,
            ];
        });

        return response()->json([
            'message' => 'Hero images retrieved successfully',
            'data' => $heroImagesWithUrl,
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_content_id' => 'required|integer|min:1',
            'src' => 'required|file|image|max:5120', // max 5MB
            'alt' => 'required|string|max:255',
        ]);

        // Store uploaded image in public disk
        $imagePath = $request->file('src')->store('hero_image', 'public');

        // Create new HeroImage record
        $heroImage = HeroImage::create([
            'page_content_id' => $data['page_content_id'],
            'src' => $imagePath,
            'alt' => $data['alt'],
        ]);

        return response()->json([
            'message' => 'Hero image created successfully',
            'data' => $heroImage,
            'image_url' => asset('storage/' . $imagePath),
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ], 201);
    }

    public function show($id)
    {
        $heroImage = HeroImage::find($id);

        if (!$heroImage) {
            return response()->json([
                'message' => 'Hero image not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Hero image retrieved successfully',
            'data' => $heroImage,
            'image_url' => asset('storage/' . $heroImage->src),
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $heroImage = HeroImage::find($id);

        if (!$heroImage) {
            return response()->json([
                'message' => 'Hero image not found',
            ], 404);
        }

        $data = $request->validate([
            'page_content_id' => 'sometimes|integer|min:1',
            'src' => 'sometimes|file|image|max:5120',
            'alt' => 'sometimes|string|max:255',
        ]);

        // Handle new image upload if exists
        if ($request->hasFile('src')) {
            // Delete old image file if exists
            if ($heroImage->src) {
                Storage::disk('public')->delete($heroImage->src);
            }
            // Store new image
            $data['src'] = $request->file('src')->store('hero_image', 'public');
        }

        $heroImage->update($data);

        return response()->json([
            'message' => 'Hero image updated successfully',
            'data' => $heroImage,
            'image_url' => asset('storage/' . $heroImage->src),
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }

    public function destroy($id)
    {
        $heroImage = HeroImage::find($id);

        if (!$heroImage) {
            return response()->json([
                'message' => 'Hero image not found',
            ], 404);
        }

        // Delete image file if exists
        if ($heroImage->src) {
            Storage::disk('public')->delete($heroImage->src);
        }

        $heroImage->delete();

        return response()->json([
            'message' => 'Hero image deleted successfully',
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
        ]);
    }
}
