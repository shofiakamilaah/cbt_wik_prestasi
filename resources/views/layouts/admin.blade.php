<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - WikPrestasi')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-slate-50 min-h-screen">

    <div class="flex">
        <aside class="w-64 bg-white border-r border-slate-200 min-h-screen p-5 flex flex-col justify-between fixed">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-semibold text-slate-800 mb-8">
                    WikPrestasi
                </a>

                <p class="text-xs font-semibold text-slate-400 mb-3">MANAJEMEN PRESTASI</p>
                <nav class="space-y-1 text-sm">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }}">
                        Dashboard & Prestasi
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-50">
                        Tambah Prestasi
                    </a>
                    <a href="{{ route('home') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-50">
                        Lihat Galeri Publik
                    </a>
                </nav>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 px-3 py-2 rounded-lg text-slate-600 hover:bg-slate-50 text-sm w-full">
                    Keluar
                </button>
            </form>
        </aside>

        <main class="flex-1 p-6 ml-64">
            @if (session('success'))
                <div class="bg-green-50 text-green-700 text-sm px-4 py-3 rounded-lg border border-green-200 mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
