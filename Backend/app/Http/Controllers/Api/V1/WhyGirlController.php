<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyGirl\StoreWhyGirlRequest;
use App\Http\Requests\WhyGirl\UpdateWhyGirlRequest;
use App\Http\Resources\WhyGirlResource;
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
        return response()->json([
            'message' => 'WhyGirl retrieved successfully',
            'WhyGirl' => WhyGirlResource::collection($whyGirl)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWhyGirlRequest $request)
    {
        $validated = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $whyGirl = WhyGirl::create([
            'page' => $validated['page'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
            'page_content_id' => $validated['page_content_id'] ?? null,
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
    public function show($id)
    {
        $whyGirl = WhyGirl::find($id);

        if (!$whyGirl) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json([
            'message' => 'WhyGirl retrieved successfully',
            'WhyGirl' => WhyGirlResource::collection($whyGirl)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWhyGirlRequest $request, $id)
    {
        $whyGirl = WhyGirl::find($id);

        if (!$whyGirl) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($whyGirl->image_path) {
                Storage::disk('public')->delete($whyGirl->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('images', 'public');
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
    public function destroy($id)
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
