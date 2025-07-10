<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CtaSections;

class CtaSectionController extends Controller
{
    /**
     * Display a listing of the CTA sections.
     */
    public function index()
    {
        try {
            $ctas = CtaSections::all();

            if ($ctas->isEmpty()) {
                return response()->json([
                    'message' => 'No CTA sections found.'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json($ctas, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve CTA sections.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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

        // Condition: Check for duplicate quote
        if (CtaSections::where('quote', $validated['quote'])->exists()) {
            return response()->json([
                'message' => 'A CTA section with this quote already exists.'
            ], Response::HTTP_CONFLICT);
        }

        $cta = CtaSections::create($validated);
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
        $cta = CtaSections::findOrFail($id);
        return response()->json($cta);
    }

    /**
     * Update the specified CTA section.
     */
    public function update(Request $request, $id)
    {
        try {
            $cta = CtaSections::findOrFail($id);

            $validated = $request->validate([
                'quote' => 'sometimes|required|string',
                'button_text' => 'sometimes|required|string|max:255',
                'image_src' => 'sometimes|required|string|max:255',
                'image_alt' => 'nullable|string|max:255',
            ]);

            // Check if there are any changes
            if (!$cta->isDirty($validated)) {
                return response()->json([
                    'message' => 'No changes detected.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $cta->update($validated);

            return response()->json([
                'message' => 'CTA section updated successfully.',
                'data' => $cta
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update CTA section.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified CTA section.
     */
    public function destroy($id)
    {
        $cta = CtaSections::findOrFail($id);

        // Condition: Only delete if quote contains 'Temporary'
        if (!str_contains($cta->quote, 'Temporary')) {
            return response()->json([
                'message' => 'Only temporary CTAs can be deleted.'
            ], Response::HTTP_FORBIDDEN);
        }

        $cta->delete();

        return response()->json([
            'message' => 'CTA section deleted successfully.'
        ], Response::HTTP_OK);
    }
}
