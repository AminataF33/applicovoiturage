@extends("layouts.default")

@section("title", "Inscription Passager")

@section("content")
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full space-y-8">
        <!-- En-tête avec icône -->
        <div class="text-center">
            <div class="inline-block bg-gradient-to-r from-blue-300 to-blue-500 p-3 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold text-purple-900">Inscription Passager</h1>
            <p class="mt-2 text-sm text-purple-700">Rejoignez notre communauté et commencez à trouver des trajets</p>
        </div>

        <!-- Carte d'inscription stylisée -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <!-- Bannière supérieure avec dégradé -->
            <div class="bg-gradient-to-r from-custom-blue to-custom-purple p-6 text-white">
                <div class="flex items-center">
                    <div class="bg-white rounded-full p-2 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Devenez passager</h2>
                        <p class="text-sm opacity-90">Trouvez des trajets et économisez sur vos déplacements</p>
                    </div>
                </div>
            </div>

            <!-- Formulaire avec style amélioré -->
            <form action="{{ route('register.passager') }}" method="POST" class="p-8">
                @csrf

                <!-- Informations personnelles -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                        <div class="h-2 w-2 rounded-full bg-blue-500 mr-2"></div>
                        Informations personnelles
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" id="prenom" name="prenom" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                   required>
                        </div>
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="nom" name="nom" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                   required>
                        </div>
                    </div>
                </div>

                <!-- Coordonnées -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                        <div class="h-2 w-2 rounded-full bg-blue-500 mr-2"></div>
                        Coordonnées
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" 
                                       class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                       required>
                            </div>
                        </div>
                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <input type="text" id="telephone" name="telephone" 
                                       class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sécurité -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                        <div class="h-2 w-2 rounded-full bg-blue-500 mr-2"></div>
                        Sécurité
                    </h3>
                    
                    <div>
                        <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" id="mot_de_passe" name="mot_de_passe" 
                                   class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                   required>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimum 8 caractères, avec majuscules et chiffres</p>
                    </div>
                </div>

                <!-- Préférences de voyage (section supplémentaire) -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                        <div class="h-2 w-2 rounded-full bg-blue-500 mr-2"></div>
                        Préférences de voyage
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            <div class="flex-1">
                                <label class="flex items-center">
                                    <input type="checkbox" name="preferences[]" value="calme" class="h-4 w-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Je préfère les trajets calmes</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <div class="flex-1">
                                <label class="flex items-center">
                                    <input type="checkbox" name="preferences[]" value="conversation" class="h-4 w-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">J'aime discuter pendant les trajets</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                            <div class="flex-1">
                                <label class="flex items-center">
                                    <input type="checkbox" name="preferences[]" value="musique" class="h-4 w-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">J'apprécie la musique pendant le trajet</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accord de confidentialité -->
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" class="h-4 w-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" required>
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-600">J'accepte les <a href="#" class="text-blue-600 hover:text-blue-800">conditions d'utilisation</a> et la <a href="#" class="text-blue-600 hover:text-blue-800">politique de confidentialité</a></label>
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-400 to-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:opacity-90 transition shadow-md flex items-center justify-center">
                    <span>S'inscrire en tant que Passager</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

            <!-- Lien vers connexion Modifier la route -->
            <div class="bg-gray-50 py-4 px-8 text-center text-sm text-gray-600 border-t">
                Déjà inscrit ? <a href="{{ route('accueil') }}" class="text-blue-600 hover:text-blue-800 font-medium">Connectez-vous</a>
            </div>
        </div>

        <!-- Section avantages -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-purple-900">Économisez</h4>
                    <p class="text-xs text-gray-500">Réduisez vos frais de transport</p>
                </div>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-purple-900">Voyagez facilement</h4>
                    <p class="text-xs text-gray-500">Trouvez des trajets à la demande</p>
                </div>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-purple-900">Écologique</h4>
                    <p class="text-xs text-gray-500">Contribuez à réduire l'empreinte carbone</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
accueil