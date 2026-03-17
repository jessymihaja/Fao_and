<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function index()
    {
        return response()->json(
            Classification::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);

        $classification = Classification::create([
            'designation' => $request->designation,
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $classification,
        ]);
    }

    public function update(Request $request, $id)
    {
        $classification = Classification::findOrFail($id);

        $classification->update([
            'designation' => $request->designation,
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $classification,
        ]);
    }

    public function destroy($id)
    {
        $classification = Classification::findOrFail($id);
        $classification->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
