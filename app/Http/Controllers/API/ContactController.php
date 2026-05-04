<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = contact::paginate(15);

        return response()->json($contacts); 
    }

    public function show($id)
    {
        $contact = contact::findOrFail($id);
            
        return response()->json([
            $contact,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'sujet' => 'required|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        $contact = contact::create($request->all());

        return response()->json([
            'message' => 'Créé',
            'data' => $contact,
        ]);
    }

    public function update(Request $request, $id)
    {
        $contact = contact::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'sujet' => 'required|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        $contact->update($request->all());

        return response()->json([
            'message' => 'Mis à jour',
            'data' => $contact,
        ]);

    }

    public function destroy($id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }   
}
