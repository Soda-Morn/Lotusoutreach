<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CambodiaContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CambodiaContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combodiacontents = CambodiaContent::all();
        return response()->json($combodiacontents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'page_content_id' => 'required|integer|exists:page_contents,id',
        ]);

        // handle image if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image_path'] = $imagePath;
        }

        $content = CambodiaContent::create($validated);

        return response()->json([
            'message' => 'CambodiaContent created successfully',
            'data' => $content
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $content = CambodiaContent::find($id);

        if (!$content) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($content);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content = CambodiaContent::find($id);

        if (!$content) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $validated = $request->validate([
            'page' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'page_content_id' => 'sometimes|required|integer|exists:page_contents,id',
        ]);

        // handle image if present
        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($content->image_path) {
                Storage::disk('public')->delete($content->image_path);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image_path'] = $imagePath;
        }

        $content->update($validated);

        return response()->json([
            'message' => 'CambodiaContent updated successfully',
            'data' => $content
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = CambodiaContent::find($id);

        if (!$content) {
            return response()->json(['message' => 'Not found'], 404);
        }

        // delete old image if exists
        if ($content->image_path) {
            Storage::disk('public')->delete($content->image_path);
        }

        $content->delete();

        return response()->json(['message' => 'CambodiaContent deleted successfully']);
    }
}
