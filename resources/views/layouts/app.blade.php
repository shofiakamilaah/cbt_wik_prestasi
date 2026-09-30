<!DOCTYPE html>
<html lang="id" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WikPrestasi')</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3/dist/tabler-icons.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        wk: { bg: '#f7f8fd', input: '#eef0ff', strip: '#e8eefc', blue: '#2563eb' },
                    },
                    fontFamily: {
                        sans: ['Inter Var', '-apple-system', 'BlinkMacSystemFont', 'San Francisco', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>
<body class="flex flex-col min-h-screen w-full m-0 p-0 overflow-x-clip bg-wk-bg font-sans text-[14px] leading-[1.4285714] text-[#1e293b]">
    {{-- NAVBAR --}}
    <header class="sticky top-0 z-[1030] w-full bg-white border-b border-[#e6e8f0]">
        <div class="max-w-[1080px] mx-auto px-4 py-3 flex items-center justify-between gap-3 flex-wrap">
            <a href="{{ route('home') }}" class="font-bold text-[16px] text-[#0f172a]">WikPrestasi</a>

           <div class="hidden md:flex gap-1.5">
                <a href="{{ route('home') }}" class="px-3.5 py-1.5 rounded-lg text-[#475569] text-[13px]">Beranda</a>
                @guest
                    <a href="{{ route('login') }}" class="px-3.5 py-1.5 rounded-lg text-[#475569] text-[13px]">Isi Data Siswa</a>
                @endguest
                @auth
                    @if (auth()->user()->isTeacher())
                        <a href="{{ route('admin.dashboard') }}" class="px-3.5 py-1.5 rounded-lg text-[#475569] text-[13px]">Dashboard</a>
                    @endif
                @endauth
            </div>

            <div class="flex items-center gap-2">
                @guest
                    <a href="{{ route('login') }}"
                       class="px-4 py-[7px] border border-[#d5d9e5] rounded-lg bg-white text-[#0f172a] text-[13px]">Masuk</a>
                    <a href="{{ route('register') }}"
                       class="px-4 py-[7px] rounded-lg bg-wk-blue text-white text-[13px] font-medium hover:opacity-90">
                        <i class="ti ti-user-plus"></i> Daftar Siswa
                    </a>
                @endguest

                @auth
                    <span class="text-[#667382] text-[13px]">Halo, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit"
                                class="px-4 py-[7px] border border-[#d5d9e5] rounded-lg bg-white text-[#0f172a] text-[13px] cursor-pointer">
                            <i class="ti ti-logout"></i> Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1">
        @if(session('success'))
            <div class="max-w-[1080px] mx-auto px-4 mt-4">
                <div role="alert"
                     class="flex items-start justify-between gap-3 mb-4 px-4 py-3 rounded border border-[#2fb344]/30 border-l-4 border-l-[#2fb344] bg-[#eaf7ed] text-[#2fb344]">
                    <div>
                        <i class="ti ti-circle-check mr-2"></i>
                        {{ session('success') }}
                    </div>
                    <button type="button" aria-label="close" class="cursor-pointer opacity-60 hover:opacity-100"
                            onclick="this.closest('[role=alert]').remove()">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="w-full mt-10 bg-white border-t border-[#e6e8f0]">
        <div class="max-w-[1080px] mx-auto px-4 py-3 flex justify-between gap-2 flex-wrap text-[11px] text-[#475569]">
            <span>© {{ date('Y') }} WikPrestasi - SMK Wikrama Bogor. </span>
        </div>
    </footer>
</body>
</html>
