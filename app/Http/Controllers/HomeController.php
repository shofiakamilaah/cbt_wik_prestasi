<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $prestasi = Achievement::with(['student', 'category'])
            ->latest('achievement_date')
            ->get()
            ->map(function (Achievement $achievement) {
                return [
                    'gradient' => 'linear-gradient(135deg, #13233c, #1e6792)',
                    'solid' => true,
                    'warna' => '#d97706',
                    'badge' => $achievement->achievement,
                    'tahun' => $achievement->achievement_date->format('Y'),
                    'judul' => $achievement->competition_name,
                    'siswa' => $achievement->student?->name ?? 'Siswa Wikrama',
                    'kelas' => $achievement->student?->rombel ?? '-',
                    'penyelenggara' => $achievement->organizer,
                    'tanggal' => $achievement->achievement_date->translatedFormat('j M Y'),
                    'gambar' => $achievement->documentation
                        ? Storage::url($achievement->documentation)
                        : null,
                ];
            });

        if ($prestasi->isEmpty()) {
            $prestasi = collect([[
                'gradient' => 'linear-gradient(135deg, #13233c, #1e6792)',
                'solid' => true,
                'warna' => '#d97706',
                'badge' => 'Juara 1 Nasional',
                'tahun' => '2026',
                'judul' => 'LKS Nasional Bidang Web Technologies',
                'siswa' => 'Andi Saputra',
                'kelas' => 'PPLG XI-3',
                'penyelenggara' => 'Kemendikbudristek RI',
                'tanggal' => '14 Feb 2026',
                'gambar' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=900&q=85',
            ]]);
        }

        return view('home', compact('prestasi'));
    }
}
