@extends('layouts.app')

@section('title', 'Register Page')

@section('content')
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form action="" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="confirmEmail" class="form-label">Confirm Email</label>
                    <input type="email" name="confirmEmail" id="confirmEmail" class="form-control @error('confirmEmail') is-invalid @enderror" value="{{ old('confirmEmail') }}">
                    @error('confirmEmail')
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
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror">
                    @error('confirmPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection