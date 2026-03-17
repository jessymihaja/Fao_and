<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json(
            Status::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);

        $status = Status::create([
            'designation' => $request->designation,
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        $status->update([
            'designation' => $request->designation,
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $status,
        ]);
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
