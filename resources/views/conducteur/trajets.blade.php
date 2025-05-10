@extends("layouts.default")
@section("title", "Mes Trajets")
@section("content")

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
                    <a href="{{ route('conducteur.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Dashboard
                    </a>
                    <a href="{{ route('conducteur.trajets') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-purple-500 text-sm font-medium text-purple-900">
                        Mes Trajets
                    </a>
                    <a href="{{ route('conducteur.trajets.create') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Créer un Trajet
                    </a>
                    <!-- <a href="{{ route('messages.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300"> -->
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
                    
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Votre Profil</a>
                        <a href="{{ route('conducteur.vehicules') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Mes Véhicules</a>
                        <a href="{{ route('parametres') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Paramètres</a>
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

    <!-- Mobile menu -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('conducteur.dashboard') }}" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">
                Dashboard
            </a>
            <a href="{{ route('conducteur.trajets') }}" class="bg-purple-50 border-l-4 border-purple-500 text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">
                Mes Trajets
            </a>
            <a href="{{ route('conducteur.trajets.create') }}" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium">
                Créer un Trajet
            </a>
            <!-- <a href="{{ route('messages.index') }}" class="border-l-4 border-transparent text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700 block pl-3 pr-4 py-2 text-base font-medium"> -->
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
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Votre Profil
                </a>
                <a href="{{ route('conducteur.vehicules') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Mes Véhicules
                </a>
                <a href="{{ route('parametres') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
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
    <div class="px-4 py-6 sm:px-0 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Mes Trajets</h1>
            <p class="mt-1 text-sm text-gray-600">Gérez tous vos trajets passés, en cours et à venir.</p>
        </div>
        <a href="{{ route('conducteur.trajets.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nouveau trajet
        </a>
    </div>

    <!-- Filtres -->
    <div class="px-4 sm:px-0 mb-5">
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <form action="{{ route('conducteur.trajets') }}" method="GET" class="flex flex-wrap gap-4">
                <div class="w-full sm:w-auto">
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select name="statut" id="statut" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                        <option value="">Tous</option>
                        <option value="a_venir" {{ request('statut') == 'a_venir' ? 'selected' : '' }}>À venir</option>
                        <option value="en_cours" {{ request('statut') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                        <option value="termine" {{ request('statut') == 'termine' ? 'selected' : '' }}>Terminés</option>
                        <option value="annule" {{ request('statut') == 'annule' ? 'selected' : '' }}>Annulés</option>
                    </select>
                </div>
                <div class="w-full sm:w-auto">
                    <label for="date_debut" class="block text-sm font-medium text-gray-700">Date début</label>
                    <input type="date" name="date_debut" id="date_debut" value="{{ request('date_debut') }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                </div>
                <div class="w-full sm:w-auto">
                    <label for="date_fin" class="block text-sm font-medium text-gray-700">Date fin</label>
                    <input type="date" name="date_fin" id="date_fin" value="{{ request('date_fin') }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                </div>
                <div class="w-full sm:w-auto">
                    <label for="tri" class="block text-sm font-medium text-gray-700">Trier par</label>
                    <select name="tri" id="tri" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                        <option value="date_desc" {{ request('tri') == 'date_desc' ? 'selected' : '' }}>Date (récent → ancien)</option>
                        <option value="date_asc" {{ request('tri') == 'date_asc' ? 'selected' : '' }}>Date (ancien → récent)</option>
                        <option value="prix_asc" {{ request('tri') == 'prix_asc' ? 'selected' : '' }}>Prix (croissant)</option>
                        <option value="prix_desc" {{ request('tri') == 'prix_desc' ? 'selected' : '' }}>Prix (décroissant)</option>
                    </select>
                </div>
                <div class="w-full sm:w-auto flex items-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                        Filtrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Liste des trajets -->
    <div class="px-4 sm:px-0">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <ul role="list" class="divide-y divide-gray-200">
                @forelse($trajets as $trajet)
                <li>
                    <a href="{{ route('conducteur.trajets.show', $trajet->id) }}" class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        @if($trajet->statut == 'a_venir')
                                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        @elseif($trajet->statut == 'en_cours')
                                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                            </div>
                                        @elseif($trajet->statut == 'termine')
                                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}</div>
                                        <div class="text-sm text-gray-500">
                                            <time datetime="{{ $trajet->date_depart }}">{{ \Carbon\Carbon::parse($trajet->date_depart)->format('d/m/Y à H:i') }}</time>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $trajet->prix }}€
                                    </span>
                                    <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        {{ $trajet->places_reservees }}/{{ $trajet->places_disponibles }} places
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                @if($trajet->statut == 'a_venir')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        À venir
                                    </span>
                                @elseif($trajet->statut == 'en_cours')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        En cours
                                    </span>
                                @elseif($trajet->statut == 'termine')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Terminé
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Annulé
                                    </span>
                                @endif
                                @if($trajet->demandes_en_attente > 0)
                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        {{ $trajet->demandes_en_attente }} demande(s) en attente
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                </li>
                @empty
                <li class="px-4 py-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun trajet trouvé</h3>
                    <p class="mt-1 text-sm text-gray-500">Commencez par créer un nouveau trajet.</p>
                    <div class="mt-6">
                        <a href="{{ route('conducteur.trajets.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Créer un trajet
                        </a>
                    </div>
                </li>
                @endforelse
            </ul>
            
            <!-- Pagination -->
            @if(isset($trajets) && $trajets->hasPages())
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    @if($trajets->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-50">
                            Précédent
                        </span>
                    @else
                        <a href="{{ $trajets->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Précédent
                        </a>
                    @endif
                    
                    @if($trajets->hasMorePages())
                        <a href="{{ $trajets->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Suivant
                        </a>
                    @else
                        <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-gray-50">
                            Suivant
                        </span>
                    @endif
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Affichage de <span class="font-medium">{{ $trajets->firstItem() }}</span> à <span class="font-medium">{{ $trajets->lastItem() }}</span> sur <span class="font-medium">{{ $trajets->total() }}</span> trajets
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            {{-- Liens de pagination générés par Laravel --}}
                            {{ $trajets->links() }}
                        </nav>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Toggle des menus
    document.addEventListener('DOMContentLoaded', function() {
        // Bouton dropdown du menu utilisateur
        const dropdownButton = document.querySelector('.dropdown-button');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        
        if (dropdownButton) {
            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });
        }
        
        // Menu mobile
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                // Toggle des icônes du menu
                const menuIcon = mobileMenuButton.querySelector('svg.block');
                const closeIcon = mobileMenuButton.querySelector('svg.hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }

        // Fermer le menu dropdown si on clique en dehors
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
@endsection

