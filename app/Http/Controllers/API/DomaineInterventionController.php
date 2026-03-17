<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DomaineIntervention;
use Illuminate\Http\Request;

class DomaineInterventionController extends Controller
{
    public function index()
    {
        return response()->json(
            DomaineIntervention::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
            'description' => 'nullable',
        ]);

        $domaineIntervention = DomaineIntervention::create([
            'designation' => $request->designation,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $domaineIntervention,
        ]);
    }

    public function update(Request $request, $id)
    {
        $domaineIntervention = DomaineIntervention::findOrFail($id);

        $domaineIntervention->update([
            'designation' => $request->designation,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $domaineIntervention,
        ]);
    }

    public function destroy($id)
    {
        $domaineIntervention = DomaineIntervention::findOrFail($id);
        $domaineIntervention->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
