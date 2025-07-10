<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ApproachTabs;
use Illuminate\Http\Request;

class ApproachTableController extends Controller
{
    // GET /api/v1/approach-tabs
    public function index()
    {
        return response()->json(
            ApproachTabs::with('approach')->get(),
            200
        );
    }

    // POST /api/v1/approach-tabs
    public function store(Request $request)
    {
        $validated = $request->validate([
            'approach_id' => 'required|exists:approaches,id',
            'key' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $tab = ApproachTabs::create($validated);

        return response()->json($tab, 201);
    }

    // GET /api/v1/approach-tabs/{id}
    public function show(string $id)
    {
        $tab = ApproachTabs::with('approach')->findOrFail($id);

        return response()->json($tab, 200);
    }

    // PUT /api/v1/approach-tabs/{id}
    public function update(Request $request, string $id)
    {
        $tab = ApproachTabs::findOrFail($id);

        $validated = $request->validate([
            'approach_id' => 'sometimes|exists:approaches,id',
            'key' => 'sometimes|string|max:255',
            'title' => 'sometimes|string|max:255',
            'content' => 'nullable|string',
        ]);

        $tab->update($validated);

        return response()->json($tab, 200);
    }

    // DELETE /api/v1/approach-tabs/{id}
    public function destroy(string $id)
    {
        $tab = ApproachTabs::findOrFail($id);
        $tab->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
