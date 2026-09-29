<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WikPrestasi')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3/dist/tabler-icons.min.css">

    <style>
        :root {
            --wk-bg: #f7f8fd;
            --wk-input: #eef0ff;
            --wk-strip: #e8eefc;
            --wk-blue: #2563eb;
        }
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }

        body {
            background: var(--wk-bg);
            font-size: 14px;
            color: #1e293b;
        }
        .wrap { max-width: 1080px; margin: 0 auto; padding: 0 16px; }

        /* NAVBAR */
        .wk-nav {
            position: sticky; top: 0; z-index: 1030;
            background: #fff; border-bottom: 1px solid #e6e8f0; width: 100%;
        }
        .wk-nav-in {
            display: flex; align-items: center; justify-content: space-between;
            gap: 12px; flex-wrap: wrap; padding-top: 12px; padding-bottom: 12px;
        }
        .wk-brand { font-weight: 700; font-size: 16px; color: #0f172a; text-decoration: none; }
        .wk-links { display: flex; gap: 6px; }
        .wk-links a {
            padding: 6px 14px; border-radius: 8px; color: #475569;
            text-decoration: none; font-size: 13px;
        }
        .wk-links a.active { background: #eef1fb; color: #0f172a; font-weight: 600; }
        .wk-btn-outline {
            padding: 7px 16px; border: 1px solid #d5d9e5; border-radius: 8px;
            background: #fff; color: #0f172a; font-size: 13px; text-decoration: none;
        }
        .wk-btn-blue {
            padding: 7px 16px; border-radius: 8px; background: var(--wk-blue);
            color: #fff; font-size: 13px; font-weight: 500; text-decoration: none; border: 0;
        }
        .wk-btn-blue:hover { color: #fff; opacity: .92; }

        /* FOOTER: full kiri-kanan, kecil */
        .wk-footer { background: #fff; border-top: 1px solid #e6e8f0; width: 100%; margin-top: 40px; }
        .wk-footer-in {
            display: flex; justify-content: space-between; gap: 8px; flex-wrap: wrap;
            padding-top: 12px; padding-bottom: 12px; font-size: 11px; color: #475569;
        }
        .wk-footer a { color: #0f172a; font-weight: 500; text-decoration: none; margin-left: 16px; }
        .wk-footer a:first-child { margin-left: 0; }

        /* LOGIN / REGISTER */
        .wk-auth { max-width: 472px; margin: 28px auto 0; padding: 0 16px; }
        .wk-back { font-size: 12px; color: #334155; text-decoration: none; }
        .wk-auth-card {
            background: #fff; border-radius: 12px; margin-top: 12px; overflow: hidden;
            border-top: 5px solid #000; box-shadow: 0 10px 30px rgba(15, 23, 42, .10);
        }
        .wk-auth-body { padding: 24px; }
        .wk-auth-body h1 { font-size: 20px; font-weight: 700; margin-bottom: 22px; }
        .wk-field { position: relative; margin-bottom: 18px; }
        .wk-field label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; }
        .wk-field input {
            width: 100%; height: 44px; border: 1px solid transparent; border-radius: 8px;
            background: var(--wk-input); padding: 0 40px 0 14px; font-size: 13px; outline: none;
        }
        .wk-field input:focus { border-color: var(--wk-blue); background: #fff; }
        .wk-field input.is-invalid { border-color: #dc2626; }
        .wk-field .ico { position: absolute; right: 12px; bottom: 11px; color: #94a3b8; font-size: 16px; }
        .wk-error { color: #dc2626; font-size: 12px; margin-top: 4px; }
        .wk-submit {
            width: 100%; height: 44px; border: 0; border-radius: 8px; background: #000;
            color: #fff; font-size: 14px; font-weight: 500; margin-top: 6px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .18);
        }
        .wk-cancel { display: block; text-align: center; margin-top: 14px; font-size: 12px; color: #334155; text-decoration: none; }
        .wk-auth-strip { background: var(--wk-strip); padding: 12px 24px; font-size: 12px; color: #334155; }
        .wk-alert { background: #ecfdf3; color: #15803d; border-radius: 8px; padding: 10px 14px; font-size: 13px; margin-bottom: 16px; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <header class="wk-nav">
        <div class="wrap wk-nav-in">
            <a href="{{ route('home') }}" class="wk-brand">WikPrestasi</a>

            <div class="wk-links d-none d-md-flex">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="#">Isi Data Siswa</a>
            </div>

            <div class="d-flex align-items-center gap-2">
                @guest
                    <a href="{{ route('login') }}" class="wk-btn-outline">Masuk</a>
                    <a href="{{ route('register') }}" class="wk-btn-blue"><i class="ti ti-user-plus"></i> Daftar Siswa</a>
                @endguest

                @auth
                    <span class="text-secondary" style="font-size:13px;">Halo, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="wk-btn-outline"><i class="ti ti-logout"></i> Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-fill">
        @if(session('success'))
            <div class="wrap mt-3">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div>
                        <i class="ti ti-circle-check me-2"></i>
                        {{ session('success') }}
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="wk-footer">
        <div class="wrap wk-footer-in">
            <span>© {{ date('Y') }} WikPrestasi - SMK Wikrama Bogor. </span>
           
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"></script>
</body>
</html>
