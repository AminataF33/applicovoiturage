<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RechercheController extends Controller
{
    
    public function index()
    {
        return view('recherche'); 
    }

    public function chercher(Request $request)
    {
    
        $lieu_depart = $request->lieu_depart;
        $destination = $request->destination;
        $date = $request->date;

        $trajets = [
            ['id' => 1, 'lieu_depart' => $lieu_depart, 'destination' => $destination, 'date' => $date],
        ];

        return view('resultats', compact('trajets'));
    }
}
