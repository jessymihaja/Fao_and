<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EntiteAccreditee;
use Illuminate\Http\Request;

class EntiteAccrediteeController extends Controller
{
    public function index()
    {
        return response()->json(
            EntiteAccreditee::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
            'sigle' => 'required',
        ]);

        $entiteAccreditee = EntiteAccreditee::create([
            'designation' => $request->designation,
            'sigle' => $request->sigle,
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $entiteAccreditee,
        ]);
    }

    public function update(Request $request, $id)
    {
        $entiteAccreditee = EntiteAccreditee::findOrFail($id);

        $entiteAccreditee->update([
            'designation' => $request->designation,
            'sigle' => $request->sigle,
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $entiteAccreditee,
        ]);
    }

    public function destroy($id)
    {
        $entiteAccreditee = EntiteAccreditee::findOrFail($id);
        $entiteAccreditee->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
