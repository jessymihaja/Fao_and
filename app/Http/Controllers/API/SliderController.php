<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = slider::all();

        return response()->json($sliders); 
    }

    public function active_sliders(){
        $sliders = slider::where('is_active', true)->get();
        return response()->json($sliders); 
    }

    public function show($id)
    {
        $slider = slider::findOrFail($id);
            
        return response()->json([
            $slider,
        ]);
    }

     public function store(Request $request): JsonResponse
    {
        $request->validate([
            'titre'      => ['required', 'string', 'max:255'],
            'sous_titre' => ['nullable', 'string'],
            'image'      => ['nullable'],
            'cta_text'   => ['nullable', 'string', 'max:100'],
            'cta_url'    => ['nullable', 'string', 'max:255'],
            'ordre'      => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable'],
        ]);

        $data = $request->only(['titre', 'sous_titre', 'cta_text', 'cta_url', 'ordre']);
        $data['is_active'] = filter_var($request->input('is_active', true), FILTER_VALIDATE_BOOLEAN);

        if ($request->hasFile('image')) {
            $file          = $request->file('image');
            $data['image'] = $file->storeAs('sliders', Str::uuid() . '.' . $file->extension(), 'public');
        } elseif ($request->filled('image') && is_string($request->input('image'))) {
            $data['image'] = $request->input('image');
        }

        return response()->json(Slider::create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $slider = slider::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:50',
            'sous_titre' => 'required|string|max:50',
            'image' => 'required|string|max:500',
            'cta_text' => 'required|string|max:50',
            'cta_url' => 'required|string|max:500',
            'ordre' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        $slider->update($request->all());

        return response()->json([
            'message' => 'Mis à jour',
            'data' => $slider,
        ]);

    }

    public function destroy($id)
    {
        $slider = slider::findOrFail($id);
        $slider->delete();

        return response()->json([
            'message' => 'Supprimé',
        ]);
    }   
}
