<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalAchievements = Achievement::count();
        $totalStudents = Student::whereHas('achievements')->count();
        $currentYear = now()->year;
        $achievementsThisYear = Achievement::whereYear('achievement_date', $currentYear)->count();
        $topLevelAchievements = Achievement::where(function ($query) {
            $query->where('achievement', 'like', '%Nasional%')
                ->orWhere('achievement', 'like', '%Internasional%');
        })->count();

        $achievementsByCategory = Category::withCount('achievements')->get();

        $achievementsByMonth = Achievement::selectRaw('MONTH(achievement_date) as month, COUNT(*) as total')
            ->whereYear('achievement_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $monthlyChartData = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyChartData[] = $achievementsByMonth->get($month, 0);
        }

        $recentAchievements = Achievement::with('student', 'category')
            ->latest('achievement_date')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalAchievements',
            'totalStudents',
            'achievementsThisYear',
            'topLevelAchievements',
            'achievementsByCategory',
            'monthlyChartData',
            'recentAchievements'
        ));
    }
}
