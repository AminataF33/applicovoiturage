
@extends("layouts.default")

@section("title", "Résultats de la recherche")
@section("content")
<div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-2xl">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Résultats de la recherche</h1>

    @if($trajets && count($trajets) > 0)
        <ul>
            @foreach($trajets as $trajet)
                <li>
                    <p><strong>Lieu de départ :</strong> {{ $trajet['lieu_depart'] }}</p>
                    <p><strong>Destination :</strong> {{ $trajet['destination'] }}</p>
                    <p><strong>Date :</strong> {{ $trajet['date'] }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucun trajet trouvé.</p>
    @endif
</div>
@endsection
