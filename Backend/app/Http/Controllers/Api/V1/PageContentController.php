<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\PageContents;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    /**
     * GET /api/v1/page-contents
     */
    public function index()
    {
        $pageContents = PageContents::all();

        return response()->json([
            'message' => 'Page contents retrieved successfully.',
            'data' => $pageContents
        ]);
    }

    /**
     * POST /api/v1/page-contents
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $pageContent = PageContents::create($validated);

        return response()->json([
            'message' => 'Page content created successfully.',
            'data' => $pageContent
        ], 201);
    }

    /**
     * GET /api/v1/page-contents/{id}
     */
    public function show($id)
    {
        $pageContent = PageContents::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Page content not found.'], 404);
        }

        return response()->json([
            'message' => 'Page content retrieved successfully.',
            'data' => $pageContent
        ]);
    }

    /**
     * PUT or PATCH /api/v1/page-contents/{id}
     */
    public function update(Request $request, $id)
    {
        $pageContent = PageContents::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Page content not found.'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $pageContent->update($validated);

        return response()->json([
            'message' => 'Page content updated successfully.',
            'data' => $pageContent
        ]);
    }

    /**
     * DELETE /api/v1/page-contents/{id}
     */
    public function destroy($id)
    {
        $pageContent = PageContents::find($id);

        if (!$pageContent) {
            return response()->json(['message' => 'Page content not found.'], 404);
        }

        $pageContent->delete();

        return response()->json(['message' => 'Page content deleted successfully.']);
    }
}
