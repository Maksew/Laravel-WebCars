<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {
        return view('rating.create');
    }

    // Vous pourriez également ajouter d'autres méthodes ici, comme 'store', 'edit', 'update', etc.
}
