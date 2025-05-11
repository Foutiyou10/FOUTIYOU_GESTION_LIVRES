<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Affiche la liste des livres avec pagination
    public function index()
    {
        $books = Book::paginate(5); // Bonus : pagination
        return view('books.index', compact('books'));
    }

    // Affiche les détails d’un livre avec ses avis
    public function show($id)
    {
        $book = Book::with('reviews.user')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Pages statiques
    public function about()
    {
        return view('books.about');
    }

    public function service()
    {
        return view('books.service');
    }

    public function contact()
    {
        return view('books.contact');
    }

    // Page des services (CRUD)
    public function services()
    {
        $books = Book::all();
        return view('books.service', compact('books'));
    }

    // 🔥 La méthode pour ajouter un livre via formulaire POST
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        // Création dans la base
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'published_at' => $request->published_at,
        ]);

        // Redirection avec message de succès
        return redirect()->route('services')->with('success', 'Livre ajouté avec succès.');
    }

    public function destroy($id)
    {
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->route('services')->with('success', 'Livre supprimé avec succès.');
    }

    public function edit($id)
    {
    $book = Book::findOrFail($id);
    return view('books.edit', compact('book'));
    }

     public function update(Request $request, $id)
    {
        // Validation des données envoyées
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        // Récupérer le livre
        $book = Book::findOrFail($id);

        // Mise à jour des informations du livre
        $book->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
        ]);

        // Redirection avec un message de succès
        return redirect()->route('books.index')->with('success', 'Le livre a été mis à jour avec succès');
    }

}
