<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterInitiative;
use App\Models\WaterInitiatives;

class WaterInitiativeController extends Controller
{
    public function index()
    {
        $initiatives = WaterInitiatives::all();
        return response()->json($initiatives);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'highlight' => 'nullable|string',
            'stat_value' => 'nullable|string',
            'stat_text' => 'nullable|string',
            'image_src' => 'nullable|string',
            'image_alt' => 'nullable|string',
        ]);

        $initiative = WaterInitiatives::create($validated);

        return response()->json([
            'message' => 'Created successfully',
            'data' => $initiative
        ], 201);
    }

    public function show($id)
    {
        $initiative = WaterInitiatives::find($id);

        if (!$initiative) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($initiative);
    }

    public function update(Request $request, $id)
    {
        $initiative = WaterInitiatives::find($id);

        if (!$initiative) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'highlight' => 'nullable|string',
            'stat_value' => 'nullable|string',
            'stat_text' => 'nullable|string',
            'image_src' => 'nullable|string',
            'image_alt' => 'nullable|string',
        ]);

        $initiative->update($validated);

        return response()->json([
            'message' => 'Updated successfully',
            'data' => $initiative
        ]);
    }

    public function destroy($id)
    {
        $initiative = WaterInitiatives::find($id);

        if (!$initiative) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $initiative->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
