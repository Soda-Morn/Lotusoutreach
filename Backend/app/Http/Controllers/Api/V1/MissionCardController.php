<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MissionCards;
use Illuminate\Http\Request;

class MissionCardController extends Controller
{
    /**
     * GET /api/v1/mission-cards
     */
    public function index()
    {
        $missionCards = MissionCards::with('mission')->get();

        return response()->json([
            'message' => 'Mission cards retrieved successfully.',
            'data' => $missionCards
        ]);
    }

    /**
     * POST /api/v1/mission-cards
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mission_id' => 'required|exists:missions,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'title_class' => 'nullable|string|max:100',
            'image' => 'nullable|string|max:255',
            'alt' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $missionCard = MissionCards::create($validated);

        return response()->json([
            'message' => 'Mission card created successfully.',
            'data' => $missionCard->load('mission')
        ], 201);
    }

    /**
     * GET /api/v1/mission-cards/{id}
     */
    public function show($id)
    {
        $missionCard = MissionCards::with('mission')->find($id);

        if (!$missionCard) {
            return response()->json(['message' => 'Mission card not found.'], 404);
        }

        return response()->json([
            'message' => 'Mission card retrieved successfully.',
            'data' => $missionCard
        ]);
    }

    /**
     * PUT or PATCH /api/v1/mission-cards/{id}
     */
    public function update(Request $request, $id)
    {
        $missionCard = MissionCards::find($id);

        if (!$missionCard) {
            return response()->json(['message' => 'Mission card not found.'], 404);
        }

        $validated = $request->validate([
            'mission_id' => 'sometimes|exists:missions,id',
            'title' => 'sometimes|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'title_class' => 'nullable|string|max:100',
            'image' => 'nullable|string|max:255',
            'alt' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $missionCard->update($validated);

        return response()->json([
            'message' => 'Mission card updated successfully.',
            'data' => $missionCard->load('mission')
        ]);
    }

    /**
     * DELETE /api/v1/mission-cards/{id}
     */
    public function destroy($id)
    {
        $missionCard = MissionCards::find($id);

        if (!$missionCard) {
            return response()->json(['message' => 'Mission card not found.'], 404);
        }

        $missionCard->delete();

        return response()->json(['message' => 'Mission card deleted successfully.']);
    }
}