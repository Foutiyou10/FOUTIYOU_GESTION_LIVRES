@extends('layout.template')

@section('title', 'Détails du Livre')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Auteur :</strong> {{ $book->author }}</p>
    <p><strong>Description :</strong> {{ $book->description }}</p>
    <p><strong>Date de publication :</strong> {{ $book->published_at }}</p>
    <p><strong>Note moyenne :</strong> 
    @if ($book->reviews->count() > 0)
        {{ number_format($book->reviews->avg('rating'), 1) }}/5
    @else
        Aucune note
    @endif
</p>


    <hr>

    <h2>Avis</h2>
@if ($book->reviews->count())
    <ul>
        @foreach ($book->reviews as $review)
            <li>
                <strong>
                    {{-- Vérification de l'existence d'un utilisateur lié à l'avis --}}
                    {{ $review->user ? $review->user->name : $review->username }}
                    ({{ $review->rating }}/5) :
                </strong>
                <p>{{ $review->comment }}</p>
            </li>
        @endforeach
    </ul>
    @else
    <p>Aucun avis pour ce livre.</p>
    @endif

    <hr>

    <h3>Ajouter un avis</h3>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h3>Laisser un avis</h3>

    <form action="{{ route('reviews.store', ['bookId' => $book->id]) }}" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Votre nom" required style="width: 50%; padding: 8px; margin: 5px 0;"><br>
    <textarea name="comment" placeholder="Votre avis..." required style="width: 50%; padding: 8px; margin: 5px 0;"></textarea><br>
    
     <!-- Champ pour la note -->
    <label for="rating">Note (1 à 5):</label>
    <select name="rating" id="rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br>
    
    <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Envoyer l'avis</button>
</form>

@endsection
