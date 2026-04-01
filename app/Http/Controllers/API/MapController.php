<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $maps = Map::all();

        return response()->json($maps);
    }

    public function store(Request $request)
    {
        $map = Map::create($request->all());

        return response()->json($map, 201);
    }

    public function show($id)
    {
        $map = Map::find($id);
        if (! $map) {
            return response()->json(['message' => 'Map not found'], 404);
        }

        return response()->json($map);
    }

    public function update(Request $request, $id)
    {
        $map = Map::find($id);
        if (! $map) {
            return response()->json(['message' => 'Map not found'], 404);
        }
        $map->update($request->all());

        return response()->json($map);
    }

    public function destroy($id)
    {
        $map = Map::find($id);
        if (! $map) {
            return response()->json(['message' => 'Map not found'], 404);
        }
        $map->delete();

        return response()->json(['message' => 'Map deleted']);
    }
}
