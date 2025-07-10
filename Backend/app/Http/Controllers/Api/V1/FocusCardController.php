<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FocusCards;

class FocusCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FocusCards::with('focusArea')->get(), 200); // Fixed from focus_Area to focusArea
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'focus_area_id' => 'required|exists:focus_areas,id',
            'title'         => 'required|string|max:255',
            'image'         => 'nullable|string',
            'summary'       => 'nullable|string',
            'content'       => 'nullable|string',
        ]);

        $focusCard = FocusCards::create($validated);

        return response()->json([
            'message' => 'Focus card created successfully.',
            'data' => $focusCard
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $focusCard = FocusCards::with('focusArea')->findOrFail($id);
        return response()->json($focusCard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $focusCard = FocusCards::findOrFail($id);

        $validated = $request->validate([
            'focus_area_id' => 'sometimes|exists:focus_areas,id',
            'title'         => 'sometimes|string|max:255',
            'image'         => 'nullable|string',
            'summary'       => 'nullable|string',
            'content'       => 'nullable|string',
        ]);

        $focusCard->update($validated);

        return response()->json([
            'message' => 'Focus card updated successfully.',
            'data' => $focusCard
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $focusCard = FocusCards::findOrFail($id);
        $focusCard->delete();

        return response()->json([
            'message' => 'Focus card deleted successfully.'
        ], 200);
    }
}
