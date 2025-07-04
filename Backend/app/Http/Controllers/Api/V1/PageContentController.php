<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    // GET /api/v1/page-contents
    public function index()
    {
        $pageContent= PageContent::all();
        return response()->json($pageContent);
    }

    // POST /api/v1/page-contents
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $pageContent = PageContent::create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Item created successfully',
            'data' => $pageContent,
            'image' => $imagePath ? asset('storage/' . $imagePath) : null,
        ], 201);
    }
    // GET /api/v1/page-contents/{id}
    public function show(string $id)
    {
        $pageContent = PageContent::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($pageContent);
    }

    // PUT or PATCH /api/v1/page-contents/{id}
    public function update(Request $request, string $id)
    {
        $pageContent = PageContent::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $validated = $request->validate([
            'type' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($pageContent->image_path) {
                Storage::disk('public')->delete($pageContent->image_path);
            }
            $pageContent->image_path = $request->file('image')->store('images', 'public');
        }

        $pageContent->update($validated);

        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $pageContent,
            'image' => $pageContent->image_path ? asset('storage/' . $pageContent->image_path) : null,
        ]);
    }

    // DELETE /api/v1/page-contents/{id}
    public function destroy(string $id)
    {
        $pageContent = PageContent::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        if ($pageContent->image_path) {
            Storage::disk('public')->delete($pageContent->image_path);
        }

        $pageContent->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
