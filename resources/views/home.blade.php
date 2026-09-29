@extends('layouts.app')

@section('title', 'Galeri Prestasi - WikPrestasi')
@section('nav', 'galeri')

@section('content')
<style>
    .wk-hero {
        width: 100%; padding: 48px 0 44px; text-align: center; color: #fff;
        background: radial-gradient(circle at 50% 0%, #1e3a6e 0%, #0b1730 65%);
    }
    .wk-hero h1 { font-size: 30px; font-weight: 700; margin-bottom: 10px; }
    .wk-hero p { color: #b6c2da; font-size: 13px; max-width: 520px; margin: 0 auto 26px; }
    .wk-search {
        background: #fff; border-radius: 12px; padding: 8px; max-width: 760px; margin: 0 auto;
        display: flex; gap: 8px; align-items: center; flex-wrap: wrap;
    }
    .wk-search .box {
        flex: 1 1 220px; display: flex; align-items: center; gap: 8px; background: #f1f4fb;
        border-radius: 8px; padding: 0 12px; height: 38px; color: #94a3b8;
    }
    .wk-search input { border: 0; background: transparent; outline: none; width: 100%; font-size: 12px; color: #1e293b; }
    .wk-search select {
        height: 38px; border: 0; background: #f1f4fb; border-radius: 8px;
        padding: 0 12px; font-size: 12px; color: #334155; outline: none;
    }
    .wk-search button {
        height: 38px; border: 0; border-radius: 8px; background: var(--wk-blue);
        color: #fff; padding: 0 18px; font-size: 12px; font-weight: 600;
    }

    .wk-section-title { font-size: 17px; font-weight: 700; margin: 26px 0 14px; }

    .pcard {
        background: #fff; border: 1px solid #e6e8f0; border-radius: 12px; padding: 2px 2px 12px; height: 100%;
        display: flex; flex-direction: column;
    }
    .pthumb {
        position: relative; aspect-ratio: 1.58; height: auto; border-radius: 10px; overflow: hidden;
        display: flex; align-items: center; justify-content: center;
    }
    .pthumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .pthumb .big { font-size: 54px; color: rgba(255, 255, 255, .35); }
    .pbadge {
        position: absolute; top: 8px; left: 8px; font-size: 10px; font-weight: 600;
        padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;
    }
    .ptitle {
        font-size: 13px; font-weight: 700; margin: 12px 12px 6px; line-height: 1.3;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .pstudent { font-size: 10px; margin: 0 12px 10px; color: #1e293b; }
    .pstudent i { color: var(--wk-blue); }
    .pstudent span { color: #64748b; }
    .pinfo { font-size: 10px; color: #64748b; margin: 0 12px 10px; }
    .pinfo div { display: flex; justify-content: space-between; padding: 3px 0; }
    .pinfo b { color: #1e293b; font-weight: 600; }
    .pbtn {
        margin: auto 10px 0; display: block; text-align: center; background: #e8f0fe; color: var(--wk-blue);
        border-radius: 8px; padding: 8px; font-size: 11px; font-weight: 600; text-decoration: none;
    }
    .wk-pagination { display: flex; gap: 6px; margin-top: 26px; }
    .wk-pagination a {
        width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;
        border-radius: 8px; font-size: 12px; text-decoration: none; color: #334155;
        background: #fff; border: 1px solid #e6e8f0;
    }
    .wk-pagination a.active { background: var(--wk-blue); color: #fff; border-color: var(--wk-blue); }
</style>

{{-- HERO: full kiri-kanan --}}
<section class="wk-hero">
    <div class="wrap">
        <h1>Galeri Prestasi Siswa SMK Wikrama</h1>
        <p>Pencatatan dan dokumentasi rekam jejak prestasi akademik, kejuaraan, &amp; non-akademik siswa bertaraf nasional dan internasional.</p>

        <form class="wk-search" method="GET" action="{{ route('home') }}">
            <div class="box">
                <i class="ti ti-search"></i>
                <input type="text" name="q" placeholder="Cari nama siswa, nama lomba, atau rombel...">
            </div>
            <select name="tahun">
                <option value="">Semua Tahun</option>
                <option>2026</option>
                <option>2025</option>
            </select>
            <button type="submit"><i class="ti ti-search"></i> Cari</button>
        </form>
    </div>
</section>

{{-- DAFTAR PRESTASI --}}
<div class="wrap">
    <h2 class="wk-section-title">Daftar Kejuaraan &amp; Penghargaan</h2>

    <div class="row g-3">
        @foreach ($prestasi as $p)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="pcard">
                <div class="pthumb" style="background: {{ $p['gradient'] }};">
                    {{-- @if (!empty($p['gambar']))
                        <img src="{{ $p['gambar'] }}" alt="Dokumentasi {{ $p['judul'] }}" loading="lazy">
                    @else
                        <i class="ti ti-trophy big"></i>
                    @endif --}}
                    <span class="pbadge"
                          style="{{ $p['solid'] ? 'background:'.$p['warna'].';color:#fff;' : 'background:#fff;color:'.$p['warna'].';' }}">
                        <i class="ti ti-medal"></i> {{ $p['badge'] }}
                    </span>
                </div>

                <div class="ptitle">{{ $p['judul'] }}</div>
                <div class="pstudent">
                   <b>{{ $p['siswa'] }}</b> <span>· {{ $p['kelas'] }}</span>
                </div>

                <div class="pinfo">
                    <div><span><i class="ti ti-building"></i> Penyelenggara</span><b>{{ $p['penyelenggara'] }}</b></div>
                    <div><span><i class="ti ti-calendar"></i> Tanggal</span><b>{{ $p['tanggal'] }}</b></div>
                </div>

                <a href="#" class="pbtn">Lihat Detail →</a>
            </div>
        </div>
        @endforeach
    </div>


</div>
@endsection
