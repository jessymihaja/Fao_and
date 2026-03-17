<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        return response()->json([
            Projet::all(),
        ]);
    }

    public function show($id)
    {
        $projet = Projet::findOrFail($id);

        return response()->json([
            $projet,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_utilisateur' => 'required|integer',
            'nom' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
            'classification_id' => 'required|integer',
            'status_id' => 'required|integer',
            'zone_geographique_id' => 'required|integer',
            'entite_accreditee_id' => 'required|integer',
            'domaine_intervention_id' => 'required|integer',
        ]);

        $projet = Projet::create($request->all());

        return response()->json([
            'message' => 'Créé',
            'data' => $projet,
        ]);
    }

    public function update(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);

        $request->validate([
            'id_utilisateur' => 'required|integer',
            'nom' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
            'classification_id' => 'required|integer',
            'status_id' => 'required|integer',
            'zone_geographique_id' => 'required|integer',
            'entite_accreditee_id' => 'required|integer',
            'domaine_intervention_id' => 'required|integer',
        ]);

        $projet->update($request->all());

        return response()->json([
            'message' => 'Modifié',
            'data' => $projet,
        ]);
    }

    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
