<!-- resources/views/auth/loginconducteur.blade.php -->
@extends('layouts.default')

@section('content')
    <div class="container">
        <h2>Connexion Conducteur</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="mot_de_passe" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" class="mt-1 block w-full p-2 border rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Se connecter</button>
        </form>
    </div>
@endsection
