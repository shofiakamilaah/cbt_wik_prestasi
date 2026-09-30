@extends('layouts.app')

@section('title', 'Login - WikPrestasi')

@section('content')
<div class="max-w-[472px] mx-auto mt-7 px-4">
    <a href="{{ route('home') }}" class="text-[12px] text-[#334155]"><i class="ti ti-arrow-left"></i> Beranda</a>

    <div class="bg-white rounded-xl mt-3 overflow-hidden ">
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="p-6">
                <h1 class="text-[20px] font-bold leading-[1.2] mb-[22px]">Login Pengguna</h1>

                @if (session('success'))
                    <div class="bg-[#ecfdf3] text-[#15803d] rounded-lg px-3.5 py-2.5 text-[13px] mb-4">{{ session('success') }}</div>
                @endif

                <div class="relative mb-[18px]">
                    <label class="block text-[13px] font-semibold mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com"
                           class="w-full h-11 border border-transparent rounded-lg bg-wk-input pl-3.5 pr-10 text-[13px] outline-none focus:border-wk-blue focus:bg-white @error('email') !border-[#dc2626] @enderror">
                    @error('email') <div class="text-[#dc2626] text-[12px] mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="relative mb-[18px]">
                    <label class="block text-[13px] font-semibold mb-1.5">Password</label>
                    <input type="password" name="password"
                           class="w-full h-11 border border-transparent rounded-lg bg-wk-input pl-3.5 pr-10 text-[13px] outline-none focus:border-wk-blue focus:bg-white @error('password') !border-[#dc2626] @enderror">
                    @error('password') <div class="text-[#dc2626] text-[12px] mt-1">{{ $message }}</div> @enderror
                </div>

                <button type="submit"
                        class="w-full h-11 border-0 rounded-lg bg-black text-white text-[14px] font-medium mt-1.5 cursor-pointer shadow-[0_4px_10px_rgba(0,0,0,0.18)]">
                    Login <i class="ti ti-arrow-right"></i>
                </button>

                <a href="{{ route('home') }}" class="block text-center mt-3.5 text-[12px] text-[#334155]"><i class="ti ti-x"></i> Kembali ke Beranda</a>
            </div>
        </form>
    </div>
</div>
@endsection
