@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Connexion</h2>
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
@endsection
