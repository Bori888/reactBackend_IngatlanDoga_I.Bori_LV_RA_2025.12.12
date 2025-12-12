<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    public function index()
    {
        // Minden ingatlan kategóriával együtt
        $ingatlanok = Ingatlan::with('kategoria')->get();
        return response()->json($ingatlanok);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'leiras' => 'nullable|string',
            'datum' => 'nullable|date',
            'tehermentes' => 'required|boolean',
            'ar' => 'nullable|integer|min:0',
            'kepUrl' => 'nullable|string|max:255',
            'kategoria_id' => 'required|exists:kategoriak,id',
        ]);

        $ingatlan = Ingatlan::create($validated);

        return response()->json([
            'message' => 'Ingatlan sikeresen létrehozva.',
            'ingatlan' => $ingatlan->load('kategoria')
        ], 201);
    }

    public function show(string $id)
    {
        $ingatlan = Ingatlan::with('kategoria')->findOrFail($id);
        return response()->json($ingatlan);
    }

    public function update(Request $request, string $id)
    {
        $ingatlan = Ingatlan::findOrFail($id);

        $validated = $request->validate([
            'leiras' => 'nullable|string',
            'datum' => 'nullable|date',
            'tehermentes' => 'sometimes|required|boolean',
            'ar' => 'nullable|integer|min:0',
            'kepUrl' => 'nullable|string|max:255',
            'kategoria_id' => 'sometimes|required|exists:kategoriak,id',
        ]);

        $ingatlan->update($validated);

        return response()->json([
            'message' => 'Ingatlan sikeresen frissítve.',
            'ingatlan' => $ingatlan->load('kategoria')
        ]);
    }

    public function destroy(string $id)
    {
        $ingatlan = Ingatlan::findOrFail($id);
        $ingatlan->delete();

        return response()->json(['message' => 'Ingatlan sikeresen törölve.']);
    }
}
