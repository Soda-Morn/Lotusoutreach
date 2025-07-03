<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\WhyGirl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyGirlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyGirl = WhyGirl::all();
        return response()->json($whyGirl);
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
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $whyGirl = WhyGirl::create([
            'page' => $validated['page'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
        ]);

        return response()->json([
            'message' => 'WhyGirl content created successfully',
            'data' => $whyGirl,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $whyGirl = WhyGirl::find($id);

        if (!$whyGirl) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($whyGirl);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $whyGirl = WhyGirl::find($id);

        if (!$whyGirl) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $validated = $request->validate([
            'page' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($whyGirl->image_path) {
                Storage::disk('public')->delete($whyGirl->image_path);
            }
            $whyGirl->image_path = $request->file('image')->store('images', 'public');
        }

        $whyGirl->update($validated);

        return response()->json([
            'message' => 'WhyGirl content updated successfully',
            'data' => $whyGirl,
            'image_url' => $whyGirl->image_path ? asset('storage/' . $whyGirl->image_path) : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $whyGirl = WhyGirl::find($id);

        if (!$whyGirl) {
            return response()->json(['message' => 'Not found'], 404);
        }

        if ($whyGirl->image_path) {
            Storage::disk('public')->delete($whyGirl->image_path);
        }

        $whyGirl->delete();

        return response()->json(['message' => 'WhyGirl content deleted successfully']);
    }
}
