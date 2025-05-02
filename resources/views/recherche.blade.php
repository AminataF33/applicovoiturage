@extends("layouts.default")

@section("title", "Rechercher un trajet")

@section("content")
<div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-2xl">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Rechercher un trajet</h1>

    <form action="{{ route('recherche.trajets') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Lieu de départ avec Select2 pour recherche -->
        <div>
            <label for="lieu_depart" class="block text-sm font-medium text-gray-700">Lieu de départ</label>
            <select id="lieu_depart" name="lieu_depart"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md">
                <option value="Point E">Point E</option>
                <option value="Dakar Plateau">Dakar Plateau</option>
                <option value="Rufisque">Rufisque</option>
                <option value="Mermoz">Mermoz</option>
                <option value="Ouakam">Ouakam</option>
                <option value="Pikine">Pikine</option>
                <!-- Ajoute d'autres départements ou lieux populaires -->
            </select>
        </div>

        <!-- Destination avec Select2 pour recherche -->
        <div>
            <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
            <select id="destination" name="destination"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md">
                <option value="Université Cheikh Anta Diop">Université Cheikh Anta Diop</option>
                <option value="Ile de Gorée">Ile de Gorée</option>
                <option value="La Petite Côte">La Petite Côte</option>
                <option value="Parc National du Niokolo-Koba">Parc National du Niokolo-Koba</option>
                <option value="Îles du Saloum">Îles du Saloum</option>
                <option value="Saly">Saly</option>
                <!-- Ajoute d'autres destinations populaires -->
            </select>
        </div>

        <!-- Nombre de passagers -->
        <div>
            <label for="passagers" class="block text-sm font-medium text-gray-700">Nombre de passagers</label>
            <input type="number" id="passagers" name="passagers" min="1" max="7"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md"
                   placeholder="Nombre de passagers" required>
        </div>

        <!-- Date du trajet -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date du trajet</label>
            <input type="date" id="date" name="date"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-2 px-4 rounded hover:opacity-90 transition">
            Rechercher un trajet
        </button>
    </form>
</div>
@endsection

@section("script")
<!-- Inclure jQuery et Select2 via CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    // Appliquer Select2 sur "lieu_depart" et "destination"
    $(document).ready(function() {
        $('#lieu_depart').select2({
            placeholder: 'Recherchez un lieu de départ...',
            allowClear: true,
        });

        $('#destination').select2({
            placeholder: 'Recherchez une destination...',
            allowClear: true,
        });
    });
</script>

<!-- Inclure les styles Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
