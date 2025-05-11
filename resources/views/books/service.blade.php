@extends('layout.template')

@section('content')
<div style="padding: 10px;">
    <h1>Services - Gestion des livres</h1>

    {{-- Formulaire d'ajout --}}
    <h2>Ajouter un livre</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Titre" required><br>
        <input type="text" name="author" placeholder="Auteur" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="date" name="published_at"><br>
        <button type="submit">Ajouter</button>
    </form>

    <hr>

    {{-- Liste des livres --}}
    <h2>Liste des livres</h2>
    <ul>
        @forelse($books as $book)
            <li>
                <strong>{{ $book->title }}</strong> - {{ $book->author }}

                {{-- Lien vers les détails (et avis) --}}
                <a href="{{ route('books.show', $book->id) }}">Voir</a>

                {{-- Bouton de suppression --}}
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                </form>
            </li>
        @empty
            <li>Aucun livre enregistré.</li>
        @endforelse
    </ul>
</div>
@endsection
