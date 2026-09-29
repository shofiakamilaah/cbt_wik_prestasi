@extends('layouts.app')

@section('title', 'Login - WikPrestasi')

@section('content')
<div class="wk-auth">
    <a href="{{ route('home') }}" class="wk-back"><i class="ti ti-arrow-left"></i> Beranda</a>

    <div class="wk-auth-card">
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="wk-auth-body">
                <h1>Login Pengguna</h1>

                @if (session('success'))
                    <div class="wk-alert">{{ session('success') }}</div>
                @endif

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

                <button type="submit" class="wk-submit">Login <i class="ti ti-arrow-right"></i></button>

                <a href="{{ route('home') }}" class="wk-cancel"><i class="ti ti-x"></i> Batal / Kembali ke Beranda</a>
            </div>
        </form>
    </div>
</div>
@endsection
