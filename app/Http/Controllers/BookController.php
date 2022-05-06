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

    public function update(BookRequest $request, int $id)
    {
        Book::whereId($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category
        ]);

        return redirect()->route('book.index')->with('message', 'Book updated with success!');
    }

    public function destroy(int $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return back()->with('message', 'Book deleted with success!');
    }
}
