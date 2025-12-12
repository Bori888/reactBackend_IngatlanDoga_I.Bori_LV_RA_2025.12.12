<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;

class KategoriaController extends Controller
{
    public function index()
    {
        $kategoriak = Kategoria::with('ingatlanok')->get();
        return response()->json($kategoriak);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategoria_nev' => 'required|string|max:255',
        ]);

        $kategoria = Kategoria::create($validated);

        return response()->json([
            'message' => 'Kategória sikeresen létrehozva.',
            'kategoria' => $kategoria
        ], 201);
    }

    public function show(string $id)
    {
        $kategoria = Kategoria::with('ingatlanok')->findOrFail($id);
        return response()->json($kategoria);
    }

    public function update(Request $request, string $id)
    {
        $kategoria = Kategoria::findOrFail($id);

        $validated = $request->validate([
            'kategoria_nev' => 'sometimes|required|string|max:255',
        ]);

        $kategoria->update($validated);

        return response()->json([
            'message' => 'Kategória sikeresen frissítve.',
            'kategoria' => $kategoria
        ]);
    }

    public function destroy(string $id)
    {
        $kategoria = Kategoria::findOrFail($id);
        $kategoria->delete();

        return response()->json(['message' => 'Kategória sikeresen törölve.']);
    }
}
