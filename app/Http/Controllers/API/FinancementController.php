<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Financement;
use Illuminate\Http\Request;

class FinancementController extends Controller
{
    public function index()
    {
        return response()->json([
            Financement::all(),
        ]);
    }

    public function show($id)
    {
        $financement = Financement::findOrFail($id);

        return response()->json([
            $financement,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'projet_id' => 'required|integer',
            'financeur' => 'required|string',
            'montant' => 'required|numeric',
            'devise_id' => 'required|integer',
            'montant_MGA' => 'required|numeric',
            'date_financement' => 'required|date',
            'utilisateur_id' => 'required|integer',
        ]);

        $financement = Financement::create($request->all());

        return response()->json([
            'message' => 'Créé',
            'data' => $financement,
        ]);
    }

    public function update(Request $request, $id)
    {
        $financement = Financement::findOrFail($id);

        $request->validate([
            'projet_id' => 'required|integer',
            'financeur' => 'required|string',
            'montant' => 'required|numeric',
            'devise_id' => 'required|integer',
            'montant_MGA' => 'required|numeric',
            'date_financement' => 'required|date',
            'id_utilisateur_updater' => 'required|integer',
        ]);

        $financement->update($request->all());

        return response()->json([
            'message' => 'Mis à jour',
            'data' => $financement,
        ]);

    }

    public function destroy($id)
    {
        $financement = Financement::findOrFail($id);
        $financement->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
