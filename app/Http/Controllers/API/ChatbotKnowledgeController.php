<?php

namespace App\Http\Controllers\API;
use App\Models\ChatbotKnowledge;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatbotKnowledgeController extends Controller
{
    public function knowledge()
    {
        return response()->json(ChatbotKnowledge::orderBy('category')->get());
    }

    public function storeKnowledge(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'category'  => ['required', 'string', 'max:100'],
            'keywords'  => ['required', 'string'],
            'response'  => ['required', 'string'],
        ]);

        $validated['is_active'] = filter_var($request->input('is_active', true), FILTER_VALIDATE_BOOLEAN);

        return response()->json(ChatbotKnowledge::create($validated), 201);
    }

    public function updateKnowledge(Request $request, int $id): JsonResponse
    {
        $item = ChatbotKnowledge::findOrFail($id);

        $data = $request->validate([
            'category'  => ['sometimes', 'string', 'max:100'],
            'keywords'  => ['sometimes', 'string'],
            'response'  => ['sometimes', 'string'],
        ]);

        if ($request->has('is_active')) {
            $data['is_active'] = filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN);
        }

        $item->update($data);
        return response()->json($item);
    }

    public function destroyKnowledge(int $id): JsonResponse
    {
        ChatbotKnowledge::findOrFail($id)->delete();
        return response()->json(['message' => 'Entrée supprimée.']);
    }
}
