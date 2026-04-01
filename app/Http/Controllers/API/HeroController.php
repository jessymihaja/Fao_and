<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();

        return response()->json($heroes);
    }

    public function store(Request $request)
    {
        $hero = Hero::create($request->all());

        return response()->json($hero, 201);
    }

    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);
        $hero->update($request->all());

        return response()->json($hero);
    }

    public function destroy($id)
    {
        Hero::destroy($id);

        return response()->json(null, 204);
    }
}
