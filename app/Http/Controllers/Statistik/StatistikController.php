<?php

namespace App\Http\Controllers\Statistik;

use App\Models\Images;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
     public function index(){
              // Total project
    $totalProjects = Project::count();

    // Total views semua project
    $totalViews = Project::sum('views');

    // Top 5 project paling banyak dilihat
    $topViews = Project::orderBy('views', 'desc')->take(5)->get();
    $totalCategories = Category::count();
    $media = Images::count();

 // Total folder project
    $projectFolder = storage_path('app/public/projects/');
    $diskUsedBytes = $this->folderSize($projectFolder);

    // Total disk allowed (misal 10 GB)
    $maxDisk = 10 * 1024 * 1024 * 1024; // 10GB

    // Hitung persentase
    $diskPercent = $maxDisk > 0 ? round(($diskUsedBytes / $maxDisk) * 100, 2) : 0;

    // Data grafik (7 project terbaru)
    $chartLabels = Project::orderBy('created_at', 'desc')->take(7)->pluck('title');
    $chartViews  = Project::orderBy('created_at', 'desc')->take(7)->pluck('views');
        return view('backend.statistik.index',[
        'diskUsage'     => $this->formatSize($diskUsedBytes),
        'diskPercent'   => $diskPercent,
        ],compact('totalProjects', 'totalViews', 'topViews', 'chartLabels', 'chartViews','totalCategories','media'));
    }
    // Fungsi hitung folder size
private function folderSize($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : $this->folderSize($each);
    }
    return $size;
}

// Format size
public static function formatSize($bytes)
{
    $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
    $i = 0;
    while ($bytes >= 1024 && $i < count($sizes) - 1) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, 2) . ' ' . $sizes[$i];
}
}
