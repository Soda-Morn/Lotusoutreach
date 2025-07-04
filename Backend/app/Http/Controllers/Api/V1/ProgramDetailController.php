<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramDetail\StoreProgramDetailRequest;
use App\Http\Requests\ProgramDetail\UpdateProgramDetailRequest;
use App\Http\Resources\ProgramDetailResource;
use App\Models\ProgramDetail;


class ProgramDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = ProgramDetail::all();
        return response()->json([
            'message' => 'ProgramDetail retrieved successfully',
            'ProgramDetail' => ProgramDetailResource::collection($details)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramDetailRequest $request)
    {
        $validated = $request->validated();

        $detail = ProgramDetail::create($validated);

        return response()->json([
            'message' => 'Program detail created successfully',
            'data' => $detail,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $details = ProgramDetail::find($id);

        if (!$details) {
            return response()->json(['message' => 'Program detail not found'], 404);
        }

        return response()->json([
            'message' => 'ProgramDetail retrieved successfully',
            'ProgramDetail' => ProgramDetailResource::collection($details)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramDetailRequest $request, string $id)
    {
        $detail = ProgramDetail::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Program detail not found'], 404);
        }

        $validated = $request->validated();

        $detail->update($validated);

        return response()->json([
            'message' => 'Program detail updated successfully',
            'data' => $detail,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = ProgramDetail::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Program detail not found'], 404);
        }

        $detail->delete();

        return response()->json(['message' => 'Program detail deleted successfully']);
    }
}
