<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(BookRequest $request)
    {
        $image = $request->file('image')->store('public/product');

        Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $image
        ]);

        return back()->with('message', 'Book added with success!');
    }

    public function edit(int $id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function update(UpdateFormRequest $request, int $id)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/product');
            Book::whereId($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'image' => $image
            ]);
        } else {
            Book::whereId($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category
            ]);
        }

        return redirect()->route('book.index')->with('message', 'Book updated with success!');
    }

    public function destroy(int $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return back()->with('message', 'Book deleted with success!');
    }
}
