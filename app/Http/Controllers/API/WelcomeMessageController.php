<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;

class WelcomeMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            WelcomeMessage::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'is_active',
            'welcome_message'
        ]);

        $welcomeMessage = WelcomeMessage::create([
            'is_active' => $request->is_active,
            'welcome_message' => $request->welcome_message,
        ]);

        return response()->json([
            'message' => 'Créé',
            'data' => $welcomeMessage,
        ]);
    }

    public function update(Request $request, $id)
    {
        $welcomeMessage = WelcomeMessage::findOrFail($id);

        $request->validate([
            'is_active' => 'required',
            'welcome_message' => 'required',
        ]);

        $welcomeMessage->update([
            'is_active' => $request->is_active,
            'welcome_message' => $request->welcome_message,
        ]);

        return response()->json([
            'message' => 'Modifié',
            'data' => $welcomeMessage,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WelcomeMessage $welcomeMessage)
    {
        $welcomeMessage->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }
}
