<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\partner;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = partner::all();

        return response()->json($partners); 
    }
    public function active_partners(){
        $partners = partner::where('is_active', true)->get();
        return response()->json($partners); 
    }

    public function show($id)
    {
        $partner = partner::findOrFail($id);
            
        return response()->json([
            $partner,
        ]);
    }

     public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nom'         => ['required', 'string', 'max:255'],
            'abbr'        => ['nullable', 'string', 'max:10'],
            'color'       => ['nullable', 'string', 'max:20'],
            // logo peut être : un fichier uploadé OU une chaîne (chemin local ou URL)
            'logo'        => ['nullable'],
            'logo_file'   => ['nullable', 'file', 'image', 'max:2048'],
            'url'         => ['nullable', 'url'],
            'description' => ['nullable', 'string', 'max:500'],
            'ordre'       => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['nullable'],
        ]);

        $data = $request->only(['nom', 'abbr', 'color', 'url', 'description', 'ordre']);
        $data['is_active'] = filter_var($request->input('is_active', true), FILTER_VALIDATE_BOOLEAN);

        // Priorité 1 : fichier uploadé (champ 'logo' comme file)
        if ($request->hasFile('logo')) {
            $file         = $request->file('logo');
            $data['logo'] = $file->storeAs('partners', Str::uuid() . '.' . $file->extension(), 'public');
        }
        // Priorité 2 : chemin texte fourni (ex: '/partenair/Saina.png' ou 'https://...')
        elseif ($request->filled('logo') && is_string($request->input('logo'))) {
            $data['logo'] = $request->input('logo');
        }

        return response()->json(Partner::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $partner = partner::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:50',
            'abbr' => 'required|string|max:10',
            'color' => 'required|string|max:20',
            'logo' => 'required|string|max:500',
            'url' => 'required|string|max:500',
            'description' => 'required|string|max:5000',
            'ordre' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        $partner->update($request->all());

        return response()->json([
            'message' => 'Mis à jour',
            'data' => $partner,
        ]);

    }

    public function destroy($id)
    {
        $partner = partner::findOrFail($id);
        $partner->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
