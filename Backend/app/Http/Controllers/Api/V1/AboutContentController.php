<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutContent\StoreAboutContentRequest;
use App\Http\Requests\AboutContent\UpdateAboutContentRequest;
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
    public function store(StoreAboutContentRequest $request)
    {
        $validated = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $aboutContent = AboutContent::create([
            'page' => $validated['page'], 
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
    public function update(UpdateAboutContentRequest $request, string $id)
    {
        $aboutContent = AboutContent::find($id);

        if (!$aboutContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $validated = $request->validated();

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
