@extends('layouts.app')

@section('title', 'Edit')

@section('content')
<div class="card">
    <div class="card-header">Update book</div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <label class="form-label" for="name">Name of book</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name of book" value="{{ $book->name }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br>
            <label class="form-label" for="description">Description of book</label>
            <textarea class="form-control" name="description" id="description">{{ $book->description }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br>
            <label class="form-label" for="category">Category</label>
            <select class="form-select" name="category" id="category">
                <option value=""></option>
                <option value="frictional" @if ($book->category === 'frictional') selected @endif>Frictional Book</option>
                <option value="biography" @if ($book->category === 'biography') selected @endif>Biography Book</option>
                <option value="comedy" @if ($book->category === 'comedy') selected @endif>Comedy Book</option>
                <option value="novel" @if ($book->category === 'novel') selected @endif>Novel Book</option>
                <option value="educational" @if ($book->category === 'educational') selected @endif>Education</option>
            </select>
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection