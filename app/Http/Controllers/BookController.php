<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(BookRequest $request)
    {
        Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category
        ]);

        return back()->with('message', 'Book added with success!');
    }

    public function edit(int $id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }
}
