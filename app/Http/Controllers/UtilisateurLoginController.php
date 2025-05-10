<?php 
namespace App\Http\Controllers;
use App\Models\Utilisateur; // Assure-toi que Utilisateur est bien le modèle utilisateur
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UtilisateurLoginController extends Controller
{
    // Afficher le formulaire de connexion pour l'utilisateur
    public function loginForm()
    {
        return view('auth.login'); // Page de login qui pourrait être générique
    }

    // Gérer la connexion de l'utilisateur (conducteur ou passager)
    public function login(Request $request)
    {
        // Validation des entrées
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérifier si l'utilisateur existe
        $utilisateur = Utilisateur::where('email', $request->email)->first();

        // Vérifier si l'utilisateur existe et que le mot de passe est correct
        if ($utilisateur && Hash::check($request->password, $utilisateur->password)) {
            Auth::login($utilisateur);

            // Vérifier si l'utilisateur est un conducteur et rediriger en conséquence
            if ($utilisateur->role == 'conducteur') {
                return redirect()->route('conducteur.dashboard'); // Assure-toi que cette route existe
            }

            // Si l'utilisateur est un passager, rediriger vers le tableau de bord des passagers
            return redirect()->route('passager.dashboard'); // Assure-toi que cette route existe également
        }


        // Retourner une erreur si les informations sont incorrectes
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Rediriger vers la page de login
    }
}

