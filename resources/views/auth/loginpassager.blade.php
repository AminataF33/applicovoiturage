<!-- resources/views/auth/passagerlogin.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Connexion Passager</h2>

    <form method="POST" action="{{ route('passager.login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Connexion
            </button>
        </div>

        @if (session('error'))
            <div class="mt-4 text-red-500 text-sm">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
@endsection
