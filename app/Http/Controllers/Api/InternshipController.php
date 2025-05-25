<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InternshipRequest;
use Illuminate\Http\Request;
use App\Http\Resources\InternshipResource;
use App\Models\Internship;

class InternshipController extends Controller
{
    public function index()
    {
        $internships = Internship::with(['student', 'industries', 'teacher'])->get();
        return InternshipResource::collection($internships);
    }

    public function store(InternshipRequest $request)
    {
        $internship = Internship::create($request->all());
        return response()->json([
            'message' => 'Internship berhasil ditambahkan',
            'data' => new InternshipResource($internship),
        ], 201);
    }

    public function show(string $id)
    {
        $internship = Internship::with(['student', 'industries', 'teacher'])->findOrFail($id);
        return new InternshipResource($internship);
    }

    public function update(InternshipRequest $request, string $id)
    {
        $internship = Internship::findOrFail($id);
        $internship->update($request->all());
        return response()->json([
            'message' => 'Internship berhasil diperbarui',
            'data' => new InternshipResource($internship),
        ]);
    }

    public function destroy(string $id)
    {
        $internship = Internship::findOrFail($id);
        $internship->delete();
        return response()->json([
            'message' => 'Internship berhasil dihapus',
        ], 200);
    }
}
