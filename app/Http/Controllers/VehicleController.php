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
            'price' => 'required|numeric',
            'kilometrage' => 'required|numeric',
            'engine_rating' => 'required|integer|min:0|max:10',
            'chassis_rating' => 'required|integer|min:0|max:10',
            'visual_rating' => 'required|integer|min:0|max:10',
            'general_rating' => 'required|integer|min:0|max:10',
            'description' => 'nullable|string',
            'vehicle_images' => 'nullable|array',
            'vehicle_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        Vehicle::create($data);

        return redirect()->route('vehicle.create')->with('success', 'Véhicule ajouté avec succès!');
    }


    protected $brandsAndModels = [
        'Audi' => ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q2', 'Q3', 'Q5', 'Q7', 'Q8'],
        'BMW' => ['Serie 1', 'Serie 2', 'Serie 3', 'Serie 4', 'Serie 5', 'Serie 6', 'Serie 7', 'Serie 8', 'X1', 'X3', 'X4', 'X5', 'X6', 'X7'],
        'Alfa Romeo' => ['Giulia', 'Stelvio', 'Giulietta', '4C', 'Tonale'],
        'Aston Martin' => ['DB11', 'Vantage', 'DBS Superleggera', 'Rapide', 'Valhalla'],
        'Bentley' => ['Continental GT', 'Bentayga', 'Flying Spur'],
        'Chevrolet' => ['Camaro', 'Corvette', 'Malibu', 'Silverado', 'Suburban', 'Tahoe'],
        'Dodge' => ['Challenger', 'Charger', 'Durango', 'Journey'],
        'Ferrari' => ['488', 'F8 Tributo', 'Portofino', 'SF90 Stradale', 'Roma'],
        'Fiat' => ['500', 'Panda', 'Tipo', '124 Spider'],
        'Ford' => ['Mustang', 'F-150', 'Escape', 'Explorer', 'Focus', 'Ranger'],
        'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit'],
        'Hyundai' => ['Elantra', 'Tucson', 'Santa Fe', 'Kona', 'Palisade'],
        'Jaguar' => ['F-Type', 'XE', 'XF', 'XJ', 'I-PACE'],
        'Jeep' => ['Wrangler', 'Cherokee', 'Grand Cherokee', 'Renegade', 'Compass'],
        'Kia' => ['Sorento', 'Sportage', 'Telluride', 'Soul', 'Stinger'],
        'Lamborghini' => ['Aventador', 'Huracán', 'Urus'],
        'Land Rover' => ['Range Rover', 'Discovery', 'Defender', 'Evoque', 'Velar'],
        'Lexus' => ['ES', 'RX', 'IS', 'LS', 'NX'],
        'Maserati' => ['Ghibli', 'Levante', 'Quattroporte'],
        'Mazda' => ['Mazda3', 'Mazda6', 'CX-5', 'CX-9', 'MX-5 Miata'],
        'McLaren' => ['720S', '570S', '675LT', 'Senna'],
        'Mercedes-Benz' => ['C-Class', 'E-Class', 'S-Class', 'GLC', 'GLE', 'G-Class'],
        'Mini' => ['Cooper', 'Countryman', 'Clubman', 'Convertible'],
        'Nissan' => ['Altima', 'Maxima', 'Rogue', 'Murano', 'Pathfinder'],
        'Pagani' => ['Huayra', 'Zonda'],
        'Porsche' => ['911', 'Cayenne', 'Panamera', 'Macan', 'Taycan'],
        'Ram' => ['1500', '2500', '3500'],
        'Rolls-Royce' => ['Phantom', 'Cullinan', 'Ghost', 'Wraith', 'Dawn'],
        'Subaru' => ['Outback', 'Forester', 'Impreza', 'Crosstrek', 'WRX'],
        'Tesla' => ['Model 3', 'Model S', 'Model X', 'Model Y', 'Cybertruck'],
        'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Tacoma', 'Highlander', 'Sienna'],
        'Volkswagen' => ['Golf', 'Jetta', 'Passat', 'Tiguan', 'Atlas'],
        'Volvo' => ['S60', 'S90', 'XC40', 'XC60', 'XC90'],
    ];

    public function getModelsByBrand($brand)
    {
        // Obtenez les modèles en fonction de la marque sélectionnée
        $models = $this->brandsAndModels[$brand] ?? [];
        return response()->json($models);
    }

    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard', ['vehicles' => $vehicles]);
    }
}
