@extends('layouts.app')

@section('title', 'Register - WikPrestasi')

@section('content')
<div class="max-w-[472px] mt-7 mx-auto px-4">
    <a href="{{ route('home') }}" class="text-[12px] text-[#334155] no-underline"><i class="ti ti-arrow-left"></i> Beranda</a>

    <div class="bg-white rounded-xl mt-3 overflow-hidden ">
        <form action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            <div class="p-6">
                <h1 class="text-[20px] font-bold mb-[22px]">Register</h1>

                <div class="relative mb-[18px]">
                    <label class="block text-[13px] font-semibold mb-[6px]">User Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full h-11 border rounded-lg bg-wk-input pl-[14px] pr-10 text-[13px] outline-none focus:bg-white @error('name') border-red-600 focus:border-red-600 @else border-transparent focus:border-wk-blue @enderror">
                    @error('name') <div class="text-[#dc2626] text-[12px] mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="relative mb-[18px]">
                    <label class="block text-[13px] font-semibold mb-[6px]">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com"
                           class="w-full h-11 border rounded-lg bg-wk-input pl-[14px] pr-10 text-[13px] outline-none focus:bg-white @error('email') border-red-600 focus:border-red-600 @else border-transparent focus:border-wk-blue @enderror">
                    @error('email') <div class="text-[#dc2626] text-[12px] mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="relative mb-[18px]">
                    <label class="block text-[13px] font-semibold mb-[6px]">Password</label>
                    <input type="password" name="password"
                           class="w-full h-11 border rounded-lg bg-wk-input pl-[14px] pr-10 text-[13px] outline-none focus:bg-white @error('password') border-red-600 focus:border-red-600 @else border-transparent focus:border-wk-blue @enderror">
                    @error('password') <div class="text-[#dc2626] text-[12px] mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="relative mb-[18px]">
                    <label class="block text-[13px] font-semibold mb-[6px]">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                           class="w-full h-11 border border-transparent rounded-lg bg-wk-input pl-[14px] pr-10 text-[13px] outline-none focus:bg-white focus:border-wk-blue">
                </div>

                <button type="submit" class="w-full h-11 border-0 rounded-lg bg-black text-white text-[14px] font-medium mt-[6px] shadow-[0_4px_10px_rgba(0,0,0,.18)]">Register <i class="ti ti-arrow-right"></i></button>

                <a href="{{ route('home') }}" class="block text-center mt-[14px] text-[12px] text-[#334155] no-underline"><i class="ti ti-x"></i> Kembali ke Beranda</a>
            </div>
        </form>
    </div>
</div>
@endsection
