<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageContent\StorePageContentRequest;
use App\Http\Resources\PageContentResource;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    // GET /api/v1/page-contents
    public function index()
    {
        $pageContents = PageContent::all();
        return response()->json([
            'message' => 'ProgramDetail retrieved successfully',
            'pageContent' => PageContentResource::collection($pageContents)
        ]);
    }

    // POST /api/v1/page-contents
    public function store(StorePageContentRequest $request)
    {
        $validated = $request->validated();

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

        return response()->json([
            'message' => 'ProgramDetail retrieved successfully',
            'pageContent' => PageContentResource::collection($pageContent)
        ]);
    }

    // PUT or PATCH /api/v1/page-contents/{id}
    public function update(Request $request, string $id)
    {
        $pageContent = PageContent::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $validated = $request->validated();

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
