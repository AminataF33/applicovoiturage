<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Covoiturage App') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-purple': 'rgb(201, 163, 241)',
                        'custom-blue': 'rgb(156, 186, 239)',
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to bottom right, rgb(201, 163, 241), rgb(156, 186, 239));
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <nav class="container mx-auto px-4 py-6 flex justify-between items-center">
            <div class="flex items-center">
                <div class="text-purple-900 font-bold text-xl flex items-center">
                    <div class="w-8 h-8 rounded-full bg-purple-500 mr-2 flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-3.536-6.536a1 1 0 011.414 0L10 13.586l2.122-2.122a1 1 0 111.414 1.414l-2.829 2.829a1 1 0 01-1.414 0l-2.829-2.829a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    AppliCovoiturage
                </div>
            </div>
            
            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-purple-900 hover:text-purple-800">Éléments</a>
                <a href="#" class="text-purple-900 hover:text-purple-800">Covoiturer</a>
                <a href="#" class="text-purple-900 hover:text-purple-800">Profils</a>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="#" class="hidden md:block text-purple-600 hover:text-purple-800">Aide</a>
                <button 
                    onclick="document.getElementById('roleModal').classList.remove('hidden')"
                    class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition"
                >
                    S'inscrire
                </button>
                <button 
                    onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
                    class="md:hidden rounded-md p-2 bg-white text-purple-900" 
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>
        
        <!-- Mobile menu -->
        <div id="mobileMenu" class="md:hidden bg-white p-4 absolute top-20 left-0 right-0 z-40 shadow-lg hidden">
            <div class="flex flex-col space-y-3">
                <a href="#" class="text-purple-900 hover:text-purple-700 p-2">Éléments</a>
                <a href="#" class="text-purple-900 hover:text-purple-700 p-2">Covoiturer</a>
                <a href="#" class="text-purple-900 hover:text-purple-700 p-2">Profils</a>
                <a href="#" class="text-purple-600 p-2">Aide</a>
                <button 
                    onclick="document.getElementById('roleModal').classList.remove('hidden'); document.getElementById('mobileMenu').classList.add('hidden')"
                    class="text-left text-purple-600 p-2"
                >
                    S'inscrire
                </button>
            </div>
        </div>

        <!-- Role Selection Modal -->
        <div id="roleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-purple-900">Choisissez votre rôle</h3>
                    <button onclick="document.getElementById('roleModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <a 
                        href="{{ route('register.conducteur') }}?role=conducteur" 
                        class="bg-gradient-to-r from-purple-400 to-purple-600 text-white p-4 rounded-lg text-center hover:from-purple-500 hover:to-purple-700 transition flex flex-col items-center"
                    >
                        <div class="bg-white rounded-full w-16 h-16 flex items-center justify-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a1 1 0 001-1v-1h3.5a1 1 0 00.8-.4l3-4a1 1 0 00.2-.6V8a1 1 0 00-1-1h-3.8L11.35 3.27A2 2 0 009.76 2H5a1 1 0 00-1 1v1zm1 1h5.76L12 8.67V10H4V5z" />
                            </svg>
                        </div>
                        <span class="font-semibold text-lg">Conducteur</span>
                        <p class="text-sm mt-2">Proposez vos trajets et gagnez de l'argent</p>
                    </a>
                    
                    <a 
                        href="{{ route('register.passager') }}?role=passager" 
                        class="bg-gradient-to-r from-blue-300 to-blue-500 text-white p-4 rounded-lg text-center hover:from-blue-400 hover:to-blue-600 transition flex flex-col items-center"
                    >
                        <div class="bg-white rounded-full w-16 h-16 flex items-center justify-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="font-semibold text-lg">Passager</span>
                        <p class="text-sm mt-2">Trouvez des trajets et économisez</p>
                    </a>
                </div>
                
                <div class="text-center text-sm text-gray-500">
                  <!--j'ai pas encore defini toutes les routes-->
                    <p>Déjà inscrit ? <a href="{{ url('/') }}" class="text-purple-600 hover:text-purple-800">Connectez-vous</a></p>
                </div>
            </div>
        </div>
        
        <!-- Hero Section -->
        <div class="container mx-auto px-4 py-16 relative">
            <!-- Hero Content -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-purple-900 mb-4">
                  Rejoignez Notre Appli<br />Avec vos amis!
                </h1>
                <p class="text-purple-900 max-w-xl mx-auto mb-8">
                  Trouvez vos trajets moins chers, partagez la course, déposez quelqu'un en cours de route et voyagez ensemble pour économiser.
                </p>
                <button 
                    onclick="document.getElementById('roleModal').classList.remove('hidden')"
                    class="bg-purple-600 text-white px-8 py-3 rounded-full hover:bg-purple-700 transition flex items-center mx-auto"
                >
                    <span>Rejoindre maintenant</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            
            <!-- Car Illustrations -->
            <div class="flex justify-between items-center mb-16">
                <!-- Left Car -->
                <div class="flex justify-between items-center mb-16">
                 <div>
                  <img src="{{asset('images/voiture2-removebg.png') }}" alt="Description de l'image">
                 </div>
            </div>
                <div class="w-1/3">
                    <div class="relative">
                        <div class="h-24 w-36 bg-purple-400 rounded-t-2xl rounded-b-lg"></div>
                        <div class="absolute bottom-0 left-0 h-6 w-8 bg-gray-800 rounded-full"></div>
                        <div class="absolute bottom-0 right-6 h-6 w-8 bg-gray-800 rounded-full"></div>
                        <!-- People -->
                        <div class="absolute top-0 left-4 w-8 h-8 bg-yellow-200 rounded-full"></div>
                        <div class="absolute top-0 right-4 w-8 h-8 bg-blue-200 rounded-full"></div>
                    </div>
                </div>
                
                <!-- Right Car -->
                <div class="w-1/3">
                    <div class="relative">
                        <div class="h-24 w-36 bg-blue-400 rounded-t-2xl rounded-b-lg"></div>
                        <div class="absolute bottom-0 left-0 h-6 w-8 bg-gray-800 rounded-full"></div>
                        <div class="absolute bottom-0 right-6 h-6 w-8 bg-gray-800 rounded-full"></div>
                        <!-- People -->
                        <div class="absolute top-0 left-4 w-8 h-8 bg-purple-200 rounded-full"></div>
                        <div class="absolute top-0 right-4 w-8 h-8 bg-orange-200 rounded-full"></div>
                    </div>
                </div>
            </div>
            
            <!-- Features Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-purple-200 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2">Trajet Sûr</h3>
                    <p class="text-gray-600 text-center text-sm">
                        Suivez votre voyage en temps réel et partagez-le avec vos proches en toute sécurité.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2">Communauté</h3>
                    <p class="text-gray-600 text-center text-sm">
                        Trouvez des covoitureurs fiables et créez votre propre réseau de confiance.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-purple-300 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-center mb-2">Calcul malin</h3>
                    <p class="text-gray-600 text-center text-sm">
                        Optimisez votre trajet et partagez les frais de transport en toute transparence.
                    </p>
                </div>
            </div>
            
            <!-- People Section -->
            <h2 class="text-2xl font-bold text-purple-900 text-center mb-8">
                Comment ça fonctionne
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
                <!-- Person 1 -->
                <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                    <div class="w-12 h-12 bg-purple-300 rounded-full flex-shrink-0 mr-4"></div>
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="h-2 w-2 rounded-full bg-purple-500 mr-2"></div>
                            <span class="text-sm text-purple-500 font-medium">Conducteur</span>
                        </div>
                        <h4 class="font-medium mb-1">Proposez votre trajet</h4>
                        <p class="text-xs text-gray-500">Créez un trajet sur l'application</p>
                    </div>
                </div>
                
                <!-- Person 2 -->
                <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                    <div class="w-12 h-12 bg-blue-300 rounded-full flex-shrink-0 mr-4"></div>
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="h-2 w-2 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm text-blue-500 font-medium">Passager</span>
                        </div>
                        <h4 class="font-medium mb-1">Réservez votre place</h4>
                        <p class="text-xs text-gray-500">Trouvez et réservez facilement</p>
                    </div>
                </div>
                
                <!-- Person 3 -->
                <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                    <div class="w-12 h-12 bg-purple-300 rounded-full flex-shrink-0 mr-4"></div>
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="h-2 w-2 rounded-full bg-purple-500 mr-2"></div>
                            <span class="text-sm text-purple-500 font-medium">Partagez</span>
                        </div>
                        <h4 class="font-medium mb-1">Partagez les frais</h4>
                        <p class="text-xs text-gray-500">Économisez sur vos trajets</p>
                    </div>
                </div>
                
                <!-- Person 4 -->
                <div class="bg-white p-4 rounded-lg shadow-sm flex items-center">
                    <div class="w-12 h-12 bg-blue-300 rounded-full flex-shrink-0 mr-4"></div>
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="h-2 w-2 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm text-blue-500 font-medium">Communauté</span>
                        </div>
                        <h4 class="font-medium mb-1">Évaluez vos trajets</h4>
                        <p class="text-xs text-gray-500">Contribuez à la communauté</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fermer le modal quand on clique en dehors
        window.addEventListener('click', function(e) {
            const modal = document.getElementById('roleModal');
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

