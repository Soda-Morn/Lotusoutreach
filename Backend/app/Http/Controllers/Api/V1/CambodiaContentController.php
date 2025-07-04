<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CambodiaContent\StoreCambodiaContentRequest;
use App\Http\Requests\CambodiaContent\UpdateCambodiaContentRequest;
use App\Http\Resources\CambodiaContentResource;
use App\Models\CambodiaContent;
use Illuminate\Http\Request;

class CambodiaContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Cambodia content
        $cambodiaContents = CambodiaContent::all();

        return response()->json([
            'message' => 'ProgramDetail retrieved successfully',
            'CambodiaContent' => CambodiaContentResource::collection($cambodiaContents)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCambodiaContentRequest $request)
    {
        // Validate the request data
        $validated = $request->validated();

        // Handle image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create the Cambodia content
        $combodiaContent = CambodiaContent::create([
            'page' => $validated['page'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
            'page_content_id' => $validated['page_content_id'],
        ]);

        return response()->json([
            'message' => 'Cambodia content created successfully',
            'data' => $combodiaContent,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the Cambodia content by ID
        $cambodiaContent = CambodiaContent::find($id);

        if (!$cambodiaContent) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json([
            'message' => 'ProgramDetail retrieved successfully',
            'CambodiaContent' => CambodiaContentResource::collection($cambodiaContent)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCambodiaContentRequest $request, string $id)
    {
        // Find the Cambodia content by ID
        $cambodiaContent = CambodiaContent::find($id);

        if (!$cambodiaContent) {
            return response()->json(['message' => 'Not found'], 404);
        }

        // Validate the request data
        $validated = $request->validated();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $cambodiaContent->image_path = $imagePath;
        }

        // Update the Cambodia content
        $cambodiaContent->update($validated);

        return response()->json([
            'message' => 'Cambodia content updated successfully',
            'data' => $cambodiaContent,
            'image_url' => $cambodiaContent->image_path ? asset('storage/' . $cambodiaContent->image_path) : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the Cambodia content by ID
        $cambodiaContent = CambodiaContent::find($id);

        if (!$cambodiaContent) {
            return response()->json(['message' => 'Not found'], 404);
        }

        // Delete the Cambodia content
        $cambodiaContent->delete();

        return response()->json(['message' => 'Cambodia content deleted successfully'], 200);
    }
}
