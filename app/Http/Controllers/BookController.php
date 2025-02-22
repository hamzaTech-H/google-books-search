<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Services\GoogleBooksService;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    protected $googleBooksService;

    public function __construct(GoogleBooksService $googleBooksService)
    {
        $this->googleBooksService = $googleBooksService;
    }

    public function search(Request $request)
    {
        $query = $request->query();
  
        if (!$query['q']) {
            return response()->json(['error' => 'Search query is required'], 400);
        }

        $books = $this->googleBooksService->searchBooks($query);

        if (!$books) {
            return response()->json(['error' => 'Failed to fetch books'], 500);
        }

        return view('results', compact('books'));
    }

    public function index()
    {
        $books = Book::limit(5)->get();
        $subjects = Subject::all();
        return view('books.index', [
            'books' => $books,
            'subjects' => $subjects
        ]);
    }

    public function show($id)
    {
        $response = Http::get("https://www.googleapis.com/books/v1/volumes/{$id}");

        if ($response->failed()) {
            abort(404, 'Book not found');
        }

        $book = $response->json();

        return view('books.show', compact('book'));       
    }
}