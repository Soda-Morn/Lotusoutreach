<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FocusAreas;

class FocusAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FocusAreas::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $focusArea = FocusAreas::create($validated);

        return response()->json([
            'message' => 'Focus area created successfully.',
            'data' => $focusArea
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $focusArea = FocusAreas::findOrFail($id);
        return response()->json($focusArea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $focusArea = FocusAreas::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $focusArea->update($validated);

        return response()->json([
            'message' => 'Focus area updated successfully.',
            'data' => $focusArea
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $focusArea = FocusAreas::findOrFail($id);
        $focusArea->delete();

        return response()->json([
            'message' => 'Focus area deleted successfully.'
        ], 200);
    }
}
