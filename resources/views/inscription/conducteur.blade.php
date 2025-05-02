@extends("layouts.default")

@section("title", "Inscription Conducteur")

@section("content")
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

        <!-- Carte d'inscription stylisée -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <!-- Bannière supérieure avec dégradé -->
            <div class="bg-gradient-to-r from-custom-purple to-custom-blue p-6 text-white">
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
                            <input type="text" id="prenom" name="prenom" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                   required>
                        </div>
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="nom" name="nom" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                   required>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" 
                                       class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
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
                                       class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                       required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="adresse" name="adresse" 
                                   class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                   required>
                        </div>
                    </div>
                </div>

                <!-- Sécurité -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                        <div class="h-2 w-2 rounded-full bg-purple-500 mr-2"></div>
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
                                   class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                   required>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimum 8 caractères, avec majuscules et chiffres</p>
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
                            <label for="typeVoiture" class="block text-sm font-medium text-gray-700 mb-1">Type de voiture</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a1 1 0 001-1v-1h3.5a1 1 0 00.8-.4l3-4a1 1 0 00.2-.6V8a1 1 0 00-1-1h-3.8L11.35 3.27A2 2 0 009.76 2H5a1 1 0 00-1 1v1zm1 1h5.76L12 8.67V10H4V5z" />
                                    </svg>
                                </div>
                                <input type="text" id="typeVoiture" name="typeVoiture" placeholder="ex: Renault Clio" 
                                       class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                       required>
                            </div>
                        </div>
                        <div>
                            <label for="immatriculation" class="block text-sm font-medium text-gray-700 mb-1">Immatriculation</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm3 1h6v4H7V5zm8 8v2h1v1H4v-1h1v-2h1v2h1v-2h1v2h1v-2h1v2h1v-2h1v2h1v-2h1zm-3-5H7v1h4V8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="immatriculation" name="immatriculation" placeholder="ex: AB-123-CD" 
                                       class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition" 
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accord de confidentialité -->
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" class="h-4 w-4 text-purple-600 rounded border-gray-300 focus:ring-purple-500" required>
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-600">J'accepte les <a href="#" class="text-purple-600 hover:text-purple-800">conditions d'utilisation</a> et la <a href="#" class="text-purple-600 hover:text-purple-800">politique de confidentialité</a></label>
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-3 px-4 rounded-lg hover:opacity-90 transition shadow-md flex items-center justify-center">
                    <span>S'inscrire en tant que Conducteur</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

            <!-- Lien vers connexion Modifier la route-->
            <div class="bg-gray-50 py-4 px-8 text-center text-sm text-gray-600 border-t">
                Déjà inscrit ? <a href="{{ route('accueil') }}" class="text-purple-600 hover:text-purple-800 font-medium">Connectez-vous</a>
            </div>
        </div>

        <!-- Section avantages -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-purple-900">Publiez vos trajets</h4>
                    <p class="text-xs text-gray-500">Définissez vos horaires et tarifs</p>
                </div>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-purple-900">Gagnez de l'argent</h4>
                    <p class="text-xs text-gray-500">Rentabilisez vos trajets quotidiens</p>
                </div>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-purple-900">Réduisez vos frais</h4>
                    <p class="text-xs text-gray-500">Partagez le coût de vos déplacements</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
