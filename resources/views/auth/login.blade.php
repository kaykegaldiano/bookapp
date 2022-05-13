@extends('layouts.app')

@section('title', 'Login Page')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @error('error')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="{{ route('auth.authenticate') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>                        
                    @enderror
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-12">
                    <a href="{{ route('auth.register') }}" class="text-decoration-none">Not yet registered? Sign up!</a>
                </div>
            </form>
        </div>
    </div>
@endsection