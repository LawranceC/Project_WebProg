@extends('app')

@section('navbar')
    @include('components.navbar', ['page' => 'login'])
@endsection

@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle row justify-content-center">
        <div class="card col-md-4 bg-white">
            <div class="card-header bg-white">
                <h1 class="card-title fw-bold text-center">Login</h1>
            </div>
            <div class="card-body">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="remember" {{ old('remember') == 'remember' ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary col-md-4 offset-md-4 mb-2">Login</button>
                        <div class="row">
                            <p class="text-center">Don't have an account? Register <a href="/register">here</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection