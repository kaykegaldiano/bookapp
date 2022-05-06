@extends('layouts.app')

@section('title', 'Books')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">List of Books</div>
        <div class="card-body">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->category }}</td>
                            <td>
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="deleteMessage('{{ $book->name }}', event)">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td>No book registered!</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $books->links() }}
    </div>
@endsection