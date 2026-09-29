@extends('layouts.app')

@section('title', 'Register - WikPrestasi')

@section('content')
<div class="wk-auth">
    <a href="{{ route('home') }}" class="wk-back"><i class="ti ti-arrow-left"></i> Beranda</a>

    <div class="wk-auth-card">
        <form action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            <div class="wk-auth-body">
                <h1>Register</h1>

                <div class="wk-field">
                    <label>User Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                    @error('name') <div class="wk-error">{{ $message }}</div> @enderror
                </div>

                <div class="wk-field">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="example@gmail.com" class="@error('email') is-invalid @enderror">
                    @error('email') <div class="wk-error">{{ $message }}</div> @enderror
                </div>

                <div class="wk-field">
                    <label>Password</label>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror">
                    @error('password') <div class="wk-error">{{ $message }}</div> @enderror
                </div>

                <div class="wk-field">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation">
                </div>

                <button type="submit" class="wk-submit">Register <i class="ti ti-arrow-right"></i></button>

                <a href="{{ route('home') }}" class="wk-cancel"><i class="ti ti-x"></i> Batal / Kembali ke Beranda</a>
            </div>
        </form>
    </div>
</div>
@endsection
