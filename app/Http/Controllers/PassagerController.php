<?php
namespace App\Http\Controllers;

use App\Models\Passager;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;

class PassagerController extends Controller
{
    public function showForm()
    {
        return view('auth.login'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:utilisateur',
            'password' => 'required|string|min:6',
            'preferences' => 'required|string',
        ]);

        // Créer l'utilisateur
        $utilisateur = Utilisateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Créer le passager spécifique
        Passager::create([
            'utilisateur_id' => $utilisateur->id,
            'preferences' => $request->preferences,
        ]); 


        return redirect()->route('login');
    }
        public function showLoginForm()
    {
        return view('auth.login');
    }
    public function dashboard()
    {
        // Assurez-vous que l'utilisateur connecté est bien un passager
        if (Auth::user()->role !== 'passager') {
            return redirect()->route('accueil');
        }

        return view('passager.dashboard');
    }
}

