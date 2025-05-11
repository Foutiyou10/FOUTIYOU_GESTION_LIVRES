<?php
namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(Request $request, $bookId)
    {
    $request->validate([
        'username' => 'required|string|max:255',
        'comment' => 'required|string|max:1000',
        'rating' =>'nullable|integer|min:1|max:5',
    ]);

    Review::create([
        'book_id' => $bookId,
        'user_id' => null,
        'username' => $request->username,
        'comment' => $request->comment,
        
    ]);

   return redirect()->route('books.show', $bookId)
        ->with('success', 'Avis ajouté avec succès !')
        ->with('rating', $request->rating); 
    }
}

