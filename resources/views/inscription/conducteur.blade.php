@extends("layouts.default")
@section("title", "Inscription Conducteur")
@section("content")
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
                <!-- Right Side Menu -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-700 px-3 py-2 text-sm font-medium">
                        Connexion
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-purple-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Ouvrir le menu</span>
                        <!-- Menu icon -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('accueil') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700">
                    Accueil
                </a>
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700">
                    Trajets
                </a>
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700">
                    À propos
                </a>
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700">
                    Contact
                </a>
                <div class="pt-4 pb-3 border-t border-gray-200">
                <!--le changer en bouton plus tard-->
                    <a href="{{ route('accueil') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-purple-300 hover:text-purple-700">
                        Connexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full space-y-8">
            <!-- En-tête avec icône -->
            <div class="text-center">
                <div class="inline-block bg-gradient-to-r from-purple-400 to-purple-600 p-3 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a1 1 0 001-1v-1h3.5a1 1 0 00.8-.4l3-4a1 1 0 00.2-.6V8a1 1 0 00-1-1h-3.8L11.35 3.27A2 2 0 009.76 2H5a1 1 0 00-1 1v1zm1 1h5.76L12 8.67V10H4V5z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-extrabold text-purple-900">Inscription Conducteur</h1>
                <p class="mt-2 text-sm text-purple-700">Rejoignez notre communauté et commencez à proposer vos trajets</p>
            </div>

            <!-- Affichage des erreurs de validation -->
            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <div class="font-medium">Veuillez corriger les erreurs suivantes :</div>
                </div>
                <ul class="mt-3 list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Carte d'inscription stylisée -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <!-- Bannière supérieure avec dégradé -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-700 p-6 text-white">
                    <div class="flex items-center">
                        <div class="bg-white rounded-full p-2 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Devenez conducteur</h2>
                            <p class="text-sm opacity-90">Proposez vos trajets et gagnez de l'argent</p>
                        </div>
                    </div>
                </div>

                <!-- Formulaire avec style amélioré -->
                <form action="{{ route('register.conducteur') }}" method="POST" class="p-8">
                    @csrf

                    <!-- Informations personnelles -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                            <div class="h-2 w-2 rounded-full bg-purple-500 mr-2"></div>
                            Informations personnelles
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}"
                                    class="w-full px-4 py-2 border @error('prenom') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                    required>
                                @error('prenom')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                                    class="w-full px-4 py-2 border @error('nom') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                    required>
                                @error('nom')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Coordonnées -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                            <div class="h-2 w-2 rounded-full bg-purple-500 mr-2"></div>
                            Coordonnées
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @error('email') text-red-400 @else text-gray-400 @enderror" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="w-full pl-10 px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                        required>
                                </div>
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @error('telephone') text-red-400 @else text-gray-400 @enderror" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}"
                                        class="w-full pl-10 px-4 py-2 border @error('telephone') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                        required>
                                </div>
                                @error('telephone')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @error('adresse') text-red-400 @else text-gray-400 @enderror" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}"
                                    class="w-full pl-10 px-4 py-2 border @error('adresse') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                    required>
                            </div>
                            @error('adresse')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>        
                    
                    <!-- Mot de passe -->
                    <div class="mb-6">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @error('password') text-red-400 @else text-gray-400 @enderror" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="password" id="mot_de_passe" name="password" 
                                    class="w-full pl-10 px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                    required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" id="togglepassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" id="eyeIcon">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @else
                                <p class="mt-1 text-xs text-gray-500">Minimum 8 caractères, avec majuscules et chiffres</p>
                            @enderror
                        </div>
                        
                        <!-- Confirmation du mot de passe -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmez le mot de passe</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @error('password_confirmation') text-red-400 @else text-gray-400 @enderror" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="password" id="mot_de_passe_confirmation" name="password_confirmation" 
                                    class="w-full pl-10 px-4 py-2 border @error('password_confirmation') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                    required>
                            </div>
                            @error('password_confirmation')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

            <!-- Infos véhicule -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                    <div class="h-2 w-2 rounded-full bg-purple-500 mr-2"></div>
                    Informations du véhicule 
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="type_voiture" class="block text-sm font-medium text-gray-700 mb-1">Type de voiture</label>
                        <input type="text" id="type_voiture" name="type_voiture" placeholder="ex: Renault Clio"
                            value="{{ old('type_voiture') }}"
                            class="w-full px-4 py-2 border @error('type_voiture') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                            required>
                        @error('type_voiture')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="immatriculation" class="block text-sm font-medium text-gray-700 mb-1">Immatriculation</label>
                        <input type="text" id="immatriculation" name="immatriculation" placeholder="ex: AB-123-CD"
                            value="{{ old('immatriculation') }}"
                            class="w-full px-4 py-2 border @error('immatriculation') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                            required>
                        @error('immatriculation')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="marque" class="block text-sm font-medium text-gray-700 mb-1">Marque</label>
                        <input type="text" id="marque" name="marque" placeholder="ex: Renault"
                            value="{{ old('marque') }}"
                            class="w-full px-4 py-2 border @error('marque') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                        @error('marque')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="modele" class="block text-sm font-medium text-gray-700 mb-1">Modèle</label>
                        <input type="text" id="modele" name="modele" placeholder="ex: Clio 4"
                            value="{{ old('modele') }}"
                            class="w-full px-4 py-2 border @error('modele') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                        @error('modele')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="couleur" class="block text-sm font-medium text-gray-700 mb-1">Couleur</label>
                        <input type="text" id="couleur" name="couleur" placeholder="ex: Bleu"
                            value="{{ old('couleur') }}"
                            class="w-full px-4 py-2 border @error('couleur') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                            required>
                        @error('couleur')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                                <label for="nombre_places" class="block text-sm font-medium text-gray-700 mb-1">Nombre de places</label>
                                <input type="number" id="nombre_places" name="nombre_places" placeholder="ex: 5" min="1" max="8"
                                    value="{{ old('nombre_places') }}"
                                    class="w-full px-4 py-2 border @error('nombre_places') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                    required>
                                @error('nombre_places')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <!-- Terms and conditions -->
                    <div class="mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" required>
                            <label for="terms" class="ml-2 block text-sm text-gray-700">
                                J'accepte les <a href="#" class="text-purple-600 hover:text-purple-800">conditions d'utilisation</a> et la <a href="#" class="text-purple-600 hover:text-purple-800">politique de confidentialité</a>
                            </label>
                        </div>
                    </div>

                    <!-- Bouton d'inscription -->
                     <a href="{{ route('login') }}" class="w-full">
                     <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-3 px-4 rounded-lg hover:opacity-90 transition shadow-md flex items-center justify-center">
                        <span>S'inscrire en tant que Conducteur</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                     </a>
                </form>

                <!-- Lien vers connexion -->
                <div class="bg-gray-50 py-4 px-8 text-center text-sm text-gray-600 border-t">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-medium">Connectez-vous</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Script pour le menu mobile -->
<script>
    // Gestion de l'ouverture/fermeture du menu mobile
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                // Toggle la classe hidden pour afficher/masquer le menu
                mobileMenu.classList.toggle('hidden');
                
                // Change l'icône du bouton
                const icon = mobileMenuButton.querySelector('svg');
                if (mobileMenu.classList.contains('hidden')) {
                    // Menu fermé, affiche l'icône burger
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
                } else {
                    // Menu ouvert, affiche l'icône X
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
                }
            });
        }
    });
</script>
@endsection
