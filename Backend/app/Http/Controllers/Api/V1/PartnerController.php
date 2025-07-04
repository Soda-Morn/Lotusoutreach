<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partners\StorePartnersRequest;
use App\Http\Resources\PartnersResource;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return response()->json([
            'message' => 'WhyGirl retrieved successfully',
            'Partners' => PartnersResource::collection($partners)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnersRequest $request)
    {
        $validated = $request->validated();

        $logoPath = null;
        if ($request->hasFile('logo_path')) {
            $logoPath = $request->file('logo_path')->store('logos', 'public');
        }

        $partner = Partner::create([
            'name' => $validated['name'],
            'logo_path' => $logoPath,
            'description' => $validated['description'] ?? null,
            'program_id' => $validated['program_id'] ?? null,
        ]);

        return response()->json([
            'message' => 'Partner created successfully',
            'data' => $partner,
            'logo_url' => $logoPath ? asset('storage/' . $logoPath) : null,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Partner not found'], 404);
        }

        return response()->json([
            'message' => 'WhyGirl retrieved successfully',
            'Partners' => PartnersResource::collection($partner)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePartnersRequest $request, string $id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Partner not found'], 404);
        }

        $validated = $request->validate([]);

        if ($request->hasFile('logo_path')) {
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $validated['logo_path'] = $request->file('logo_path')->store('logos', 'public');
        }

        $partner->update($validated);

        return response()->json([
            'message' => 'Partner updated successfully',
            'data' => $partner,
            'logo_url' => $partner->logo_path ? asset('storage/' . $partner->logo_path) : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return response()->json(['message' => 'Partner not found'], 404);
        }

        $partner->delete();

        return response()->json(['message' => 'Partner deleted successfully']);
    }
}
