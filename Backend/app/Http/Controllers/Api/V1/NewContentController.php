<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\NewContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newContents = NewContent::all();
        return response()->json($newContents);
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
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
            'page_content_id' => 'required|integer|exists:page_contents,id',
            'publication_date' => 'nullable|date',
            'author' => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $newContent = NewContent::create([
            'page' => $validated['page'],
            'type' => $validated['type'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
            'page_content_id' => $validated['page_content_id'],
            'publication_date' => $validated['publication_date'] ?? null,
            'author' => $validated['author'] ?? null,
        ]);

        return response()->json([
            'message' => 'New content created successfully',
            'data' => $newContent,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newContent = NewContent::find($id);

        if (!$newContent) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($newContent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newContent = NewContent::find($id);

        if (!$newContent) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $validated = $request->validate([
            'page' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
            'page_content_id' => 'sometimes|required|integer|exists:page_contents,id',
            'publication_date' => 'nullable|date',
            'author' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($newContent->image_path) {
                Storage::disk('public')->delete($newContent->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        $newContent->update($validated);

        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $newContent,
            'image_url' => $newContent->image_path ? asset('storage/' . $newContent->image_path) : null,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newContent = NewContent::find($id);

        if (!$newContent) {
            return response()->json(['message' => 'Not found'], 404);
        }

        if ($newContent->image_path) {
            Storage::disk('public')->delete($newContent->image_path);
        }

        $newContent->delete();

        return response()->json(['message' => 'Successfully deleted'], 200);
    }
}
