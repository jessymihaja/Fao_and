<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\faqs;
class FaqsController extends Controller
{
    public function index()
    {
        $faqs = faqs::all();

        return response()->json($faqs); 
    }
    public function active_faqs(){
        $faqs = faqs::where('is_active', true)->get();
        return response()->json($faqs); 
    }
    public function show($id)
    {
        $faq = faqs::findOrFail($id);
            
        return response()->json([
            $faq,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'reponse' => 'required|string|max:5000',
            'categorie' => 'required|string|max:50',
            'ordre' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        $faq = faqs::create($request->all());

        return response()->json([
            'message' => 'Créé',
            'data' => $faq,
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = faqs::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:500',
            'reponse' => 'required|string|max:5000',
            'categorie' => 'required|string|max:50',
            'ordre' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        $faq->update($request->all());

        return response()->json([
            'message' => 'Mis à jour',
            'data' => $faq,
        ]);

    }

    public function destroy($id)
    {
        $faq = faqs::findOrFail($id);
        $faq->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
