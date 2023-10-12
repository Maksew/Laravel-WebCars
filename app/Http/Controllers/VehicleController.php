<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create()
    {
        return view('vehicle.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'category' => 'required|string',
            'energy' => 'required|string',
            'transmission' => 'required|string',
            'agency' => 'required|string',
            'price' => 'required|numeric',
            'kilometrage' => 'required|numeric',
            'region' => 'required|string',
            'engine_rating' => 'required|integer|min:0|max:10',
            'chassis_rating' => 'required|integer|min:0|max:10',
            'handling_rating' => 'required|integer|min:0|max:10',
            'visual_rating' => 'required|integer|min:0|max:10',
            'general_rating' => 'required|integer|min:0|max:10',
            'description' => 'nullable|string',
            'vehicle_images' => 'nullable|array',
            'vehicle_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicle.create')->with('success', 'Véhicule ajouté avec succès!');
    }


    public function getModelsByBrand($brand) {
        // Retournez les modèles en fonction de la marque.
        // Ceci est juste un exemple, vous devrez adapter ce code en fonction de votre base de données et de votre logique métier.
        $models = Vehicle::where('brand', $brand)->pluck('model');
        return response()->json($models);
    }


}
