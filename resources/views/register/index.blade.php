@extends('layouts.main')
@section('container')
<div class="contaniner mt-4">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal">Form Registrasi</h1>
            <form action="/register" method="POST">
                @csrf 
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" 
                    placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" 
                    placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('usename')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                    placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="floatingInput">Email Address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-buttom" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
            <button class="w-100 btn btn-lg btn-dark mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3"> Already Register?<a href="/login"> Login</a></small>
        </main>
    </div>
</div>
</div>
@endsection