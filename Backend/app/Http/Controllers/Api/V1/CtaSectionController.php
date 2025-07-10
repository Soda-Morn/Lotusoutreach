<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CtaSection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CtaSectionController extends Controller
{
    /**
     * Display a listing of the CTA sections.
     */
    public function index()
    {
        $ctas = CtaSection::all();
        return response()->json($ctas);
    }

    /**
     * Store a newly created CTA section.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quote' => 'required|string',
            'button_text' => 'required|string|max:255',
            'image_src' => 'required|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $cta = CtaSection::create($validated);
        return response()->json([
            'message' => 'CTA section created successfully.',
            'data' => $cta
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified CTA section.
     */
    public function show($id)
    {
        $cta = CtaSection::findOrFail($id);
        return response()->json($cta);
    }

    /**
     * Update the specified CTA section.
     */
    public function update(Request $request, $id)
    {
        $cta = CtaSection::findOrFail($id);

        $validated = $request->validate([
            'quote' => 'sometimes|required|string',
            'button_text' => 'sometimes|required|string|max:255',
            'image_src' => 'sometimes|required|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $cta->update($validated);

        return response()->json([
            'message' => 'CTA section updated successfully.',
            'data' => $cta
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified CTA section.
     */
    public function destroy($id)
    {
        $cta = CtaSection::findOrFail($id);
        $cta->delete();

        return response()->json([
            'message' => 'CTA section deleted successfully.'
        ], Response::HTTP_OK);
    }
}
