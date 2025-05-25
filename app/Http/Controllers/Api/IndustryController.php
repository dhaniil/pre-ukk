<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndustryRequest;
use App\Http\Resources\IndustryResource;
use App\Models\Industries;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industries::with('teacher')->get();
        return IndustryResource::collection($industries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndustryRequest $request)
    {
        $industry = Industries::create($request->validated());
        return response()->json([
            'message' => 'Industri berhasil ditambahkan',
            'data' => new IndustryResource($industry)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industry = Industries::with('teacher')->find($id);
        return new IndustryResource($industry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndustryRequest $request, string $id)
    {
        $industry = Industries::findOrFail($id);
        $industry->update($request->validated());
        return response()->json([
            'message' => 'Industri berhasil diubah',
            'data' => new IndustryResource($industry)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $industry = Industries::findOrFail($id);
        $industry->delete();
        return response()->json([
            'message' => "Industri {$industry->name} berhasil dihapus",
        ], 200);
    }
}
