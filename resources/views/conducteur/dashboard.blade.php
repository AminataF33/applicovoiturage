@extends("layouts.default")
@section("title", "Dashboard Conducteur")
@section("content")
<html class="h-full">
<body class="h-full">
<div>
<!-- Navbar -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('accueil') }}" class="flex items-center">
                        <div class="bg-gradient-to-r from-purple-400 to-purple-600 p-2 rounded-full mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a1 1 0 001-1v-1h3.5a1 1 0 00.8-.4l3-4a1 1 0 00.2-.6V8a1 1 0 00-1-1h-3.8L11.35 3.27A2 2 0 009.76 2H5a1 1 0 00-1 1v1zm1 1h5.76L12 8.67V10H4V5z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-purple-800">CoVoiturage</span>
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('conducteur.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-purple-500 text-sm font-medium text-purple-900">
                    <a href="" class="inline-flex items-center px-1 pt-1 border-b-2 border-purple-500 text-sm font-medium text-purple-900">  
                        Dashboard
                    </a>
                    <a href="{{ route('conducteur.trajets') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Mes Trajets
                    </a>
                    <a href="{{ route('conducteur.trajets.create') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Créer un Trajet
                    </a>
                    <!--messages.index -->
                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Messages
                    </a>
                </div>
            </div>
            <!-- Right Side Menu -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="relative">
                    <button type="button" class="dropdown-button flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Ouvrir le menu utilisateur</span>
                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-semibold">
                            {{ substr(Auth::user()->prenom, 0, 1) }}{{ substr(Auth::user()->nom, 0, 1) }}
                        </div>
                    </button>
                    
                    <!-- Dropdown menu, show/hide based on menu state -->
                    <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!--profile.show--> 
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Votre Profil</a>
                        <!--conducteur.vehicules-->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Mes Véhicules</a>
                        <!--parametres-->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Paramètres</a>
                        <div class="border-t border-gray-100"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Se déconnecter</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Ouvrir le menu principal</span>
                    <!-- Menu icon -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- X icon -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('conducteur.dashboard') }}" class="bg-purple-50 border-l-4 border-purple-500 text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">
                Dashboard
            </a>
            <a href="{{ route('conducteur.trajets') }}" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">
                Mes Trajets
            </a>
            <a href="{{ route('conducteur.trajets.create') }}" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">
                Créer un Trajet
            </a>
            <!--messages.index -->
            <a href="#" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">  
                Messages
            </a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-semibold">
                        {{ substr(Auth::user()->prenom, 0, 1) }}{{ substr(Auth::user()->nom, 0, 1) }}
                    </div>
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <!--profile.show-->
                <a href="#" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">  
                    Votre Profil
                </a>
                <!--conducteur.vehicules-->
                <a href="#" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">  
                    Mes Véhicules
                </a>
                <!--parametres -->
                <a href="#" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">  
                    Paramètres
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-2xl font-semibold text-gray-900">Tableau de bord conducteur</h1>
        <p class="mt-1 text-sm text-gray-600">Gérez vos trajets et consultez les demandes des passagers.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Rides Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                        <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Trajets
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $totalTrajets }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Rides Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Trajets Terminés
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $trajetsTermines }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Rides Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Trajets à Venir
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $trajetsAVenir }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                        <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Demandes en Attente
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $demandesEnAttente }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Sections -->
    <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
        <!-- Upcoming Rides Section -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <div>
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Prochains trajets</h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Vos trajets programmés à venir</p>
                </div>
                <a href="{{ route('conducteur.trajets') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-purple-700 bg-purple-100 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Voir tous
                </a>
            </div>
            <div class="border-t border-gray-200">
                <ul role="list" class="divide-y divide-gray-200">
                    @forelse($prochainsTrajets as $trajet)
                    <li>
                        <!--conducteur.trajets.show', $trajet->id)-->
                        <a href="#, $trajet->id)" class="block hover:bg-gray-50">

                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="min-w-0 flex-1 flex items-center">
                                            <div class="flex-shrink-0 text-purple-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                                </svg>
                                            </div>
                                            <div class="min-w-0 flex-1 px-4">
                                                <p class="text-sm font-medium text-purple-800 truncate">{{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}</p>
                                                <div class="mt-1 flex">
                                                    <p class="text-sm text-gray-500">
                                                        <time datetime="{{ $trajet->date_depart }}">{{ \Carbon\Carbon::parse($trajet->date_depart)->format('d/m/Y à H:i') }}</time>
                                                    </p>
                                                    <p class="ml-2 text-sm text-gray-500">
                                                        <span class="inline-flex items-center">
                                                            <svg class="mr-1 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                            {{ $trajet->places_reservees }}/{{ $trajet->places_disponibles }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-5 flex-shrink-0">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $trajet->prix }}€
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    @empty
                    <li class="px-4 py-6 sm:px-6 text-center text-gray-500">
                        <p>Vous n'avez pas de trajets programmés.</p>
                        <a href="{{ route('conducteur.trajets.create') }}" class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Créer un trajet
                        </a>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Pending Requests Section -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900">Demandes en attente</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Demandes de réservations à confirmer</p>
            </div>
            <div class="border-t border-gray-200">
                <ul role="list" class="divide-y divide-gray-200">
                    @forelse($demandes as $demande)
                    <li>
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 font-semibold">
                                            {{ substr($demande->passager->prenom, 0, 1) }}{{ substr($demande->passager->nom, 0, 1) }}
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $demande->passager->prenom }} {{ $demande->passager->nom }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <span class="font-medium">{{ $demande->trajet->ville_depart }} → {{ $demande->trajet->ville_arrivee }}</span> • {{ \Carbon\Carbon::parse($demande->trajet->date_depart)->format('d/m/Y') }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <span class="text-xs text-gray-500">{{ $demande->places }} place(s) • Demandé le {{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <form action="{{ route('conducteur.demandes.confirmer', $demande->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            Accepter
                                        </button>
                                    </form>
                                    <form action="{{ route('conducteur.demandes.refuser', $demande->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                            Refuser
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="px-4 py-6 sm:px-6 text-center text-gray-500">
                        <p>Vous n'avez pas de demandes en attente.</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

 <!-- Recent Reviews Section -->
<div class="mt-8 bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div>
            <h2 class="text-lg leading-6 font-medium text-gray-900">Avis récents</h2>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Les derniers avis laissés par vos passagers</p>
        </div>
        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-purple-700 bg-purple-100 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            Tous les avis
        </a>
    </div>
    <div class="border-t border-gray-200">
        <ul role="list" class="divide-y divide-gray-200">
            @forelse($avisRecents as $avis)
            <li class="px-4 py-4 sm:px-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 font-semibold">
                            {{ substr($avis->passager->prenom, 0, 1) }}{{ substr($avis->passager->nom, 0, 1) }}
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $avis->passager->prenom }} {{ $avis->passager->nom }}</p>
                                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($avis->created_at)->format('d/m/Y') }} • {{ $avis->trajet->ville_depart }} → {{ $avis->trajet->ville_arrivee }}</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $avis->note)
                                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.95-.69l1.07-3.292z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-gray-500">{{ $avis->note }}/5</span>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-700">{{ $avis->commentaire }}</p>
                    </div>
                </div>
            </li>
            @empty
            <li class="px-4 py-8 sm:px-6 text-center">
                <p class="text-gray-500 text-sm">Aucun avis pour le moment</p>
                <p class="text-gray-400 text-xs mt-2">Les avis de vos passagers apparaîtront ici</p>
            </li>
            @endforelse
        </ul>
        @if(count($avisRecents) > 0)
        <div class="bg-gray-50 px-4 py-4 sm:px-6 border-t border-gray-200 flex justify-center">
            <button type="button" class="text-sm text-purple-600 hover:text-purple-800 font-medium">
                Afficher plus d'avis
            </button>
        </div>
        @endif
    </div>
</div>
</div>
</body>
</html>
