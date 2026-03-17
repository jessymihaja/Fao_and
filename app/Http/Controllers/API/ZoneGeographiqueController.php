<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ZoneGeographique;
use Illuminate\Http\Request;

class ZoneGeographiqueController extends Controller
{
    public function index()
    {
        return response()->json(
            ZoneGeographique::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);

        $zoneGeographique = ZoneGeographique::create([
            'designation' => $request->designation,
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $zoneGeographique,
        ]);
    }

    public function update(Request $request, $id)
    {
        $zoneGeographique = ZoneGeographique::findOrFail($id);

        $zoneGeographique->update([
            'designation' => $request->designation,
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $zoneGeographique,
        ]);
    }

    public function destroy($id)
    {
        $zoneGeographique = ZoneGeographique::findOrFail($id);
        $zoneGeographique->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
