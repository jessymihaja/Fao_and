<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chatbot_knowledge;

class ChatbotKnowledgeController extends Controller
{
    public function index()
    {
        return response()->json(
            Chatbot_knowledge::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'category',
            'keywords',
            'response',
            'is_active'
        ]);

        $chatbot_knowledge = Chatbot_knowledge::create([
            'category' => $request->category,
            'keywords' => $request->keywords,
            'response' => $request->response,
            'is_active' => $request->is_active
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $chatbot_knowledge,
        ]);
    }

    public function update(Request $request, $id)
    {
        $chatbot_knowledge = Chatbot_knowledge::findOrFail($id);

        $request->validate([
            'category',
            'keywords',
            'response',
            'is_active'
        ]);

        $chatbot_knowledge->update([
            'category' => $request->category,
            'keywords' => $request->keywords,
            'response' => $request->response,
            'is_active' => $request->is_active
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $chatbot_knowledge,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chatbot_knowledge $chatbot_knowledge)
    {
        $chatbot_knowledge->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }   
}
