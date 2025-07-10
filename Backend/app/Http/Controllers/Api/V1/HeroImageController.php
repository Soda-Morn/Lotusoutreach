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
            'src' => 'required|file|image|max:5120', // Accept image uploads up to 5MB
            'alt' => 'required|string|max:255',
        ]);

        // Store the uploaded file
        $imagePath = $request->file('src')->store('hero_image', 'public');

        // Create the record with the stored file path
        $heroImage = HeroImage::create([
            'page_content_id' => $data['page_content_id'],
            'src' => $imagePath,
            'alt' => $data['alt'],
        ]);

        return response()->json([
            'message' => 'Hero image created successfully',
            'data' => $heroImage,
            'image_url' => asset('storage/' . $imagePath),
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
            'image_url' => asset('storage/' . $heroImage->src),
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
            'src' => 'sometimes|file|image|max:5120',
            'alt' => 'sometimes|string|max:255',
        ]);

        // If a new image is uploaded, delete the old one and store the new one
        if ($request->hasFile('src')) {
            if ($heroImage->src) {
                Storage::disk('public')->delete($heroImage->src);
            }
            $data['src'] = $request->file('src')->store('hero_image', 'public');
        }

        $heroImage->update($data);

        return response()->json([
            'message' => 'Hero image updated successfully',
            'data' => $heroImage,
            'image_url' => asset('storage/' . $heroImage->src),
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

        if ($heroImage->src) {
            Storage::disk('public')->delete($heroImage->src);
        }

        $heroImage->delete();

        return response()->json([
            'message' => 'Hero image deleted successfully',
            'timestamp' => now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
    }
}
