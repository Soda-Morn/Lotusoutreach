<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Mission_Cards;
use App\Models\Missions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class Mission_CardController extends Controller
{
    /**
     * Display a listing of the mission cards.
     *
     * @return JsonResponse Returns a JSON response with all mission cards
     */
    public function index(): JsonResponse
    {
        $missionCards = Mission_Cards::with('mission')->get();
        return response()->json([
            'data' => $missionCards,
        ], 200);
    }

    /**
     * Store a newly created mission card in storage.
     *
     * @param Request $request The HTTP request containing mission card data
     * @return JsonResponse Returns JSON response with the created resource or errors
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'mission_id' => 'required|exists:missions,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'title_class' => 'nullable|string|max:100',
            'image' => 'nullable|string|max:255',
            'alt' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $missionCard = Mission_Cards::create($request->only([
            'mission_id', 'title', 'subtitle', 'title_class', 'image', 'alt', 'description'
        ]));

        return response()->json([
            'message' => 'Mission card created successfully',
            'data' => $missionCard,
        ], 201);
    }

    /**
     * Display the specified mission card.
     *
     * @param Mission_Cards $missionCard The mission card to show
     * @return JsonResponse Returns a JSON response with the specified mission card
     */
    public function show(Mission_Cards $missionCard): JsonResponse
    {
        $missionCard->load('mission');
        return response()->json([
            'data' => $missionCard,
        ], 200);
    }

    /**
     * Update the specified mission card in storage.
     *
     * @param Request $request The HTTP request containing updated mission card data
     * @param Mission_Cards $missionCard The mission card to update
     * @return JsonResponse Returns JSON response with the updated resource or errors
     */
    public function update(Request $request, Mission_Cards $missionCard): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'mission_id' => 'required|exists:missions,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'title_class' => 'nullable|string|max:100',
            'image' => 'nullable|string|max:255',
            'alt' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $missionCard->update($request->only([
            'mission_id', 'title', 'subtitle', 'title_class', 'image', 'alt', 'description'
        ]));

        return response()->json([
            'message' => 'Mission card updated successfully',
            'data' => $missionCard->fresh(),
        ], 200);
    }

    /**
     * Remove the specified mission card from storage.
     *
     * @param Mission_Cards $missionCard The mission card to delete
     * @return JsonResponse Returns a JSON response with a success message
     */
    public function destroy(Mission_Cards $missionCard): JsonResponse
    {
        $missionCard->delete();
        return response()->json([
            'message' => 'Mission card deleted successfully',
        ], 200);
    }
}