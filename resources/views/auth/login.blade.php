@extends('layouts.app')
&nbsp;
&nbsp;

@section('content')
<h2 class="mb-4">Login</h2>
&nbsp;
&nbsp;

{{-- Display a success or welcome message --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
&nbsp;
&nbsp;

@if(session('welcome'))
    <div class="alert alert-info">{{ session('welcome') }}</div>
@endif
&nbsp;
&nbsp;

{{-- Display validation errors --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
&nbsp;
&nbsp;

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input 
            type="email" 
            class="form-control @error('email') is-invalid @enderror" 
            id="email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autofocus>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
&nbsp;
&nbsp;

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
            type="password" 
            class="form-control @error('password') is-invalid @enderror" 
            id="password" 
            name="password" 
            required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
&nbsp;
&nbsp;

    <button type="submit" class="btn btn-primary">Login</button>
</form>
<p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
@endsection