@extends('layouts.app')

@section('title', 'Book Form')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">Create a new book</div>
        <div class="card-body">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">@csrf
                <label class="form-label" for="name">Name of book</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name of book">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <br>
                <label class="form-label" for="description">Description of book</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <br>
                <label class="form-label" for="category">Category</label>
                <select class="form-select" name="category" id="category">
                    <option value=""></option>
                    <option value="frictional">Frictional Book</option>
                    <option value="biography">Biography Book</option>
                    <option value="comedy">Comedy Book</option>
                    <option value="novel">Novel Book</option>
                    <option value="educational">Education</option>
                </select>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <br>
                <label for="image" class="form-label">Image of book</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    
@endsection
