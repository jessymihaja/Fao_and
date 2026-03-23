<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Devise;
use Illuminate\Http\Request;

class DeviseController extends Controller
{
    public function index()
    {
        $devises = Devise::all();

        return response()->json($devises);
    }

    public function store(Request $request)
    {
        $devise = Devise::create($request->all());

        return response()->json($devise, 201);
    }

    public function update(Request $request, $id)
    {
        $devise = Devise::findOrFail($id);
        $devise->update($request->all());

        return response()->json($devise);
    }

    public function destroy($id)
    {
        $devise = Devise::findOrFail($id);
        $devise->delete();

        return response()->json(null, 204);
    }
}
