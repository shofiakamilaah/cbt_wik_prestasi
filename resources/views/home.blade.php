@extends('layouts.app')

@section('title', 'Galeri Prestasi - WikPrestasi')
@section('nav', 'galeri')

@section('content')

{{-- HERO --}}
<section class="w-full pt-12 pb-11 text-center text-white bg-[radial-gradient(circle_at_50%_0%,#1e3a6e_0%,#0b1730_65%)]">
    <div class="max-w-[1080px] mx-auto px-4">
        <h1 class="text-[30px] font-bold leading-[1.2] mb-2.5">Galeri Prestasi Siswa SMK Wikrama</h1>
        <p class="text-[#b6c2da] text-[13px] max-w-[520px] mx-auto mb-[26px]">Pencatatan dan dokumentasi rekam jejak prestasi akademik, kejuaraan, &amp; non-akademik siswa bertaraf nasional dan internasional.</p>

        <form class="bg-white rounded-xl p-2 max-w-[760px] mx-auto flex gap-2 items-center flex-wrap text-left"
              method="GET" action="{{ route('home') }}">
            <div class="flex-[1_1_220px] flex items-center gap-2 bg-[#f1f4fb] rounded-lg px-3 h-[38px] text-[#94a3b8]">
                <i class="ti ti-search"></i>
                <input type="text" name="q" placeholder="Cari nama siswa, nama lomba, atau rombel..."
                       class="border-0 bg-transparent outline-none w-full text-[12px] text-[#1e293b]">
            </div>
            <select name="tahun"
                    class="h-[38px] border-0 bg-[#f1f4fb] rounded-lg px-3 text-[12px] text-[#334155] outline-none">
                <option value="">Semua Tahun</option>
                <option>2026</option>
                <option>2025</option>
            </select>
            <button type="submit"
                    class="h-[38px] border-0 rounded-lg bg-wk-blue text-white px-[18px] text-[12px] font-semibold cursor-pointer">
                <i class="ti ti-search"></i> Cari
            </button>
        </form>
    </div>
</section>

{{-- DAFTAR PRESTASI --}}
<div class="max-w-[1080px] mx-auto px-4">
    <h2 class="text-[17px] font-bold leading-[1.2] mt-[26px] mb-3.5">Daftar Kejuaraan &amp; Penghargaan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 min-[992px]:grid-cols-3 gap-4">
        @foreach ($prestasi as $p)
        <div class="bg-white border border-[#e6e8f0] rounded-xl pt-0.5 px-0.5 pb-3 h-full flex flex-col">
            <div class="relative aspect-[1.58] rounded-[10px] overflow-hidden flex items-center justify-center"
                 style="background: {{ $p['gradient'] }};">
                {{-- @if (!empty($p['gambar']))
                    <img src="{{ $p['gambar'] }}" alt="Dokumentasi {{ $p['judul'] }}" loading="lazy" class="w-full h-full object-cover block">
                @else
                    <i class="ti ti-trophy text-[54px] text-white/35"></i>
                @endif --}}
                <span class="absolute top-2 left-2 text-[10px] font-semibold px-2 py-[3px] rounded-md inline-flex items-center gap-1"
                      style="{{ $p['solid'] ? 'background:'.$p['warna'].';color:#fff;' : 'background:#fff;color:'.$p['warna'].';' }}">
                    <i class="ti ti-medal"></i> {{ $p['badge'] }}
                </span>
            </div>

            <div class="text-[13px] font-bold leading-[1.3] mt-3 mx-3 mb-1.5 whitespace-nowrap overflow-hidden text-ellipsis">{{ $p['judul'] }}</div>

            <div class="text-[10px] mx-3 mb-2.5 text-[#1e293b]">
                <b>{{ $p['siswa'] }}</b> <span class="text-[#64748b]">· {{ $p['kelas'] }}</span>
            </div>

            <div class="text-[10px] text-[#64748b] mx-3 mb-2.5">
                <div class="flex justify-between py-[3px]">
                    <span><i class="ti ti-building"></i> Penyelenggara</span>
                    <b class="text-[#1e293b] font-semibold">{{ $p['penyelenggara'] }}</b>
                </div>
                <div class="flex justify-between py-[3px]">
                    <span><i class="ti ti-calendar"></i> Tanggal</span>
                    <b class="text-[#1e293b] font-semibold">{{ $p['tanggal'] }}</b>
                </div>
            </div>

            <a href="#" class="mt-auto mx-2.5 block text-center bg-[#e8f0fe] text-wk-blue rounded-lg p-2 text-[11px] font-semibold">Lihat Detail →</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
