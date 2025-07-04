<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutContents = AboutContent::all();
        return response()->json($aboutContents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'page_content_id' => 'required|integer|exists:page_contents,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $aboutContent = AboutContent::create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
            'page_content_id' => $validated['page_content_id'],
        ]);

        return response()->json([
            'message' => 'Item created successfully',
            'data' => $aboutContent,
            'image' => $imagePath ? asset('storage/' . $imagePath) : null,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aboutContent = AboutContent::find($id);

        if (!$aboutContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($aboutContent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aboutContent = AboutContent::find($id);

        if (!$aboutContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

       $validated = $request->validat([
    'page' => 'sometimes|required|string|max:255',
    'type' => 'sometimes|required|string|max:255',
    'title' => 'sometimes|required|string|max:255',
    'content' => 'sometimes|required|string',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'page_content_id' => 'sometimes|required|integer|exists:page_contents,id',
]);

// Fill only provided fields (like now)
$aboutContent->fill($validated);

// Save new image if uploaded
if ($request->hasFile('image')) {
    if ($aboutContent->image_path) {
        Storage::disk('public')->delete($aboutContent->image_path);
    }
    $imagePath = $request->file('image')->store('images', 'public');
    $aboutContent->image_path = $imagePath;
}

$aboutContent->save();
        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $aboutContent,
            'image' => $aboutContent->image_path ? asset('storage/' . $aboutContent->image_path) : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aboutContent = AboutContent::find($id);

        if (!$aboutContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        if ($aboutContent->image_path) {
            Storage::disk('public')->delete($aboutContent->image_path);
        }

        $aboutContent->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
