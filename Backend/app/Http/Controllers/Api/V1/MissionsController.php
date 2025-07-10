<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Missions;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    /**
     * GET /api/v1/missions
     */
    public function index()
    {
        $missions = Missions::with('cards')->get();

        return response()->json([
            'message' => 'Missions retrieved successfully.',
            'data' => $missions
        ]);
    }

    /**
     * POST /api/v1/missions
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $mission = Missions::create($validated);

        return response()->json([
            'message' => 'Mission created successfully.',
            'data' => $mission->load('cards')
        ], 201);
    }

    /**
     * GET /api/v1/missions/{id}
     */
    public function show($id)
    {
        $mission = Missions::with('cards')->find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission not found.'], 404);
        }

        return response()->json([
            'message' => 'Mission retrieved successfully.',
            'data' => $mission
        ]);
    }

    /**
     * PUT or PATCH /api/v1/missions/{id}
     */
    public function update(Request $request, $id)
    {
        $mission = Missions::find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission not found.'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $mission->update($validated);

        return response()->json([
            'message' => 'Mission updated successfully.',
            'data' => $mission->load('cards')
        ]);
    }

    /**
     * DELETE /api/v1/missions/{id}
     */
    public function destroy($id)
    {
        $mission = Missions::find($id);

        if (!$mission) {
            return response()->json(['message' => 'Mission not found.'], 404);
        }

        $mission->delete();

        return response()->json(['message' => 'Mission deleted successfully.']);
    }
}