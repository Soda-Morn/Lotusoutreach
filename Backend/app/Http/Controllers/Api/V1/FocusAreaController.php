<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Focus_Areas;

class FocusAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Focus_Areas::all());
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

        $focusArea = Focus_Areas::create($validated);

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
        $focusArea = Focus_Areas::findOrFail($id);
        return response()->json($focusArea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $focusArea = Focus_Areas::findOrFail($id);

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
        $focusArea = Focus_Areas::findOrFail($id);
        $focusArea->delete();

        return response()->json([
            'message' => 'Focus area deleted successfully.'
        ], 200);
    }
}
