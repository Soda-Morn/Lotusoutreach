<?php


namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest\StoreProgramRequest;
use App\Http\Requests\ProgramRequest\UpdateProgramRequest;
use App\Http\Resources\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return response()->json([
            'message' => 'Program retrieved successfully',
            'program' => ProgramResource::collection($programs)       
        ]);
    }

    public function store(StoreProgramRequest $request)
    {
        $validated = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $program = Program::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'why_girls_id' => $validated['why_girls_id'] ?? null,
            'image_path' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Program created successfully',
            'data' => $program,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
        ], 201);
    }

    public function show(string $id)
    {
        $programs = Program::find($id);

        if (!$programs) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        return response()->json([
            'message' => 'Program retrieved successfully',
            'program' => ProgramResource::collection($programs)       
        ]);
    }

    public function update(UpdateProgramRequest $request, string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($program->image_path) {
                Storage::disk('public')->delete($program->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        $program->update($validated);

        return response()->json([
            'message' => 'Program updated successfully',
            'data' => $program,
            'image_url' => $program->image_path ? asset('storage/' . $program->image_path) : null,
        ]);
    }

    public function destroy(string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        if ($program->image_path) {
            Storage::disk('public')->delete($program->image_path);
        }

        $program->delete();

        return response()->json(['message' => 'Program deleted successfully']);
    }
}