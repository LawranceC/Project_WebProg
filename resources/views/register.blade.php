@extends('app')

@section('navbar')
    @include('components.navbar', ['page' => 'register'])
@endsection

@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle row justify-content-center">
        <div class="card col-md-4 bg-white">
            <div class="card-header bg-white">
                <h1 class="card-title fw-bold text-center">Register</h1>
            </div>
            <div class="card-body">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" autocomplete="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('confirm') is-invalid @enderror" id="confirm"
                            name="confirm">
                        @error('confirm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary col-md-4 offset-md-4 mb-2">Register</button>
                        <div class="row">
                            <p class="text-center">Already have an account? Login <a href="/">here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
