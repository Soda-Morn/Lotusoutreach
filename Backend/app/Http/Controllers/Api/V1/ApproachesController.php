<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Approaches;
use Illuminate\Http\Request;

class ApproachesController extends Controller
{
    // GET /api/v1/approaches
    public function index()
    {
        return response()->json(Approaches::with('tabs')->get());
    }

    // POST /api/v1/approaches
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_src' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $approach = Approaches::create($validated);

        return response()->json($approach, 201);
    }

    // GET /api/v1/approaches/{id}
    public function show(string $id)
    {
        $approach = Approaches::with('tabs')->findOrFail($id);
        return response()->json($approach);
    }

    // PUT /api/v1/approaches/{id}
    public function update(Request $request, string $id)
    {
        $approach = Approaches::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image_src' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        $approach->update($validated);

        return response()->json($approach);
    }

    // DELETE /api/v1/approaches/{id}
    public function destroy(string $id)
    {
        $approach = Approaches::findOrFail($id);
        $approach->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}

