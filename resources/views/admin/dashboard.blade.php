@extends('layouts.admin')

@section('title', 'Dashboard - WikPrestasi')

@section('content')
    <h1 class="text-xl font-semibold text-slate-800 mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <p class="text-xs text-slate-500">Total Prestasi Terdaftar</p>
            <p class="text-2xl font-bold text-slate-800 mt-1">{{ $totalAchievements }}</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <p class="text-xs text-slate-500">Prestasi Tahun {{ now()->year }}</p>
            <p class="text-2xl font-bold text-slate-800 mt-1">{{ $achievementsThisYear }}</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <p class="text-xs text-slate-500">Tingkat Nasional/Internasional</p>
            <p class="text-2xl font-bold text-slate-800 mt-1">{{ $topLevelAchievements }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <p class="text-sm font-medium text-slate-700 mb-4">Prestasi per Kategori</p>
            <canvas id="categoryChart" height="200"></canvas>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <p class="text-sm font-medium text-slate-700 mb-4">Tren Prestasi per Bulan ({{ now()->year }})</p>
            <canvas id="monthlyChart" height="200"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-medium text-slate-700">Prestasi Terbaru</p>
            <a href="#" class="text-xs text-blue-700 hover:underline">Lihat Semua →</a>
        </div>

        <div class="space-y-3">
            @forelse ($recentAchievements as $achievement)
                <div class="flex items-center justify-between text-sm border-b border-slate-100 pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-medium text-slate-800">{{ $achievement->competition_name }}</p>
                        <p class="text-xs text-slate-500">{{ $achievement->student->name }} • {{ $achievement->category->name }}</p>
                    </div>
                    <span class="text-xs text-slate-400">{{ $achievement->achievement_date->format('d M Y') }}</span>
                </div>
            @empty
                <p class="text-sm text-slate-400 text-center py-4">Belum ada data prestasi.</p>
            @endforelse
        </div>
    </div>

    <script>
        const categoryLabels = @json($achievementsByCategory->pluck('name'));
        const categoryData = @json($achievementsByCategory->pluck('achievements_count'));

        new Chart(document.getElementById('categoryChart'), {
            type: 'bar',
            data: {
                labels: categoryLabels,
                datasets: [{
                    label: 'Jumlah Prestasi',
                    data: categoryData,
                    backgroundColor: '#1e3a8a',
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });

        const monthlyData = @json($monthlyChartData);
        const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        new Chart(document.getElementById('monthlyChart'), {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Jumlah Prestasi',
                    data: monthlyData,
                    borderColor: '#1e3a8a',
                    backgroundColor: 'rgba(30, 58, 138, 0.1)',
                    fill: true,
                    tension: 0.3,
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    </script>
@endsection
