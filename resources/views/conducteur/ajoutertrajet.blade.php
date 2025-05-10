@extends("layouts.default")
@section("title", "Ajouter un trajet")
@section("content")

<!-- Navbar - Same as login page -->
<div>
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
                    <a href="{{ route('accueil') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Accueil
                    </a>
                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Trajets
                    </a>
                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        À propos
                    </a>
                    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-purple-700 hover:border-purple-300">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-2xl w-full space-y-8">
        <!-- En-tête -->
        <div class="text-center">
            <div class="inline-block bg-gradient-to-r from-purple-400 to-purple-600 p-3 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a1 1 0 001-1v-1h3.5a1 1 0 00.8-.4l3-4a1 1 0 00.2-.6V8a1 1 0 00-1-1h-3.8L11.35 3.27A2 2 0 009.76 2H5a1 1 0 00-1 1v1zm1 1h5.76L12 8.67V10H4V5z" />
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold text-purple-900">Publier un trajet</h1>
            <p class="mt-2 text-sm text-purple-700">Proposez un trajet à partager avec d'autres voyageurs</p>
        </div>

        <!-- Messages d'erreur -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Message de succès -->
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Formulaire d'ajout de trajet -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <!-- Bannière supérieure avec dégradé -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-700 p-6 text-white">
                <div class="flex items-center">
                    <div class="bg-white rounded-full p-2 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Détails du trajet</h2>
                        <p class="text-sm opacity-90">Renseignez les informations de votre trajet</p>
                    </div>
                </div>
            </div>

            <!-- Formulaire -->
            <!-- trajet.store -->
            <form action="#" method="POST" class="p-8">
                @csrf
                
                <!-- Informations sur le véhicule -->
                <div class="mb-4">
                    <label for="vehicule_id" class="block text-sm font-medium text-gray-700 mb-1">Véhicule</label> 
                    @if(isset($vehicules) && $vehicules->count())
                        <select name="vehicule_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                            @foreach($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}">
                                    {{ $vehicule->marque }} {{ $vehicule->modele }} - {{ $vehicule->immatriculation }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <p class="text-red-500">Aucun véhicule enregistré.</p>
                    @endif
                </div>

                <!-- Itinéraire -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Itinéraire</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="ville_depart" class="block text-sm font-medium text-gray-700 mb-1">Ville de départ</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="ville_depart" name="ville_depart" value="{{ old('ville_depart') }}" class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" required>
                            </div>
                        </div>
                        <div>
                            <label for="ville_arrivee" class="block text-sm font-medium text-gray-700 mb-1">Ville d'arrivée</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="ville_arrivee" name="ville_arrivee" value="{{ old('ville_arrivee') }}" class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" required>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="adresse_depart" class="block text-sm font-medium text-gray-700 mb-1">Adresse de départ précise</label>
                            <input type="text" id="adresse_depart" name="adresse_depart" value="{{ old('adresse_depart') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" required>
                        </div>
                        <div>
                            <label for="adresse_arrivee" class="block text-sm font-medium text-gray-700 mb-1">Adresse d'arrivée précise</label>
                            <input type="text" id="adresse_arrivee" name="adresse_arrivee" value="{{ old('adresse_arrivee') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" required>
                        </div>
                    </div>
                </div>

                <!-- Date et heure -->
                <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Horaires et détails</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="date_depart" class="block text-sm font-medium text-gray-700 mb-1">Date de départ</label>
                        <input type="date" id="date_depart" name="date_depart" value="{{ old('date_depart') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required min="{{ date('Y-m-d') }}">
                    </div>
                    <div>
                        <label for="heure_depart" class="block text-sm font-medium text-gray-700 mb-1">Heure de départ</label>
                        <input type="time" id="heure_depart" name="heure_depart" value="{{ old('heure_depart') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="duree_estimee" class="block text-sm font-medium text-gray-700 mb-1">Durée estimée (minutes)</label>
                        <input type="number" id="duree_estimee" name="duree_estimee" value="{{ old('duree_estimee') }}" min="10"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                    </div>
                    <div>
                        <label for="nombre_places" class="block text-sm font-medium text-gray-700 mb-1">Nombre de places</label>
                        <input type="number" id="nombre_places" name="nombre_places" min="1" max="8"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">Prix par passager</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">F</span>
                        </div>
                        <input type="number" id="prix" name="prix" value="{{ old('prix') }}" step="0.01" min="0"
                            class="w-full pl-8 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                    </div>
                </div>
            </div>
                    
                    <div>
                        <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Commentaire pour les passagers</label>
                        <textarea id="commentaire" name="commentaire" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">{{ old('commentaire') }}</textarea>
                    </div>
                </div>

                <input type="hidden" name="conducteur_id" value="{{ auth()->id() }}">
                <input type="hidden" name="statut" value="planifié">
                
                <!-- Champs pour créer le véhicule en même temps que le trajet -->
                <input type="hidden" name="create_vehicule" value="1">

                <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-3 px-4 rounded-lg hover:opacity-90 transition shadow-md flex items-center justify-center">
                    <span>Publier ce trajet</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Script pour le menu mobile (identique à celui du login) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                
                const icon = mobileMenuButton.querySelector('svg');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
                } else {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
                }
            });
        }
    });
</script>
@endsection
