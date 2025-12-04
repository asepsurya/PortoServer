@extends('layouts.app')
@section('title', 'Statistik')

@section('container')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-xxl flex-grow-1 container-p-y">


    <div class="card mb-6">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">

                    <!-- Total Projects -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0">
                            <div>
                                <p class="mb-1 text-muted small">Total Projects</p>
                                <h4 class="mb-1 fw-bold">{{ $totalProjects }}</h4>
                                <p class="mb-0">Project aktif</p>
                            </div>
                            <span class="avatar p-2 me-sm-6">
                                <span class="avatar-initial rounded">
                                    <i class="icon-base ti tabler-folder icon-28px text-heading"></i>
                                </span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-6">
                    </div>

                    <!-- Total Views -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0">
                            <div>
                                <p class="mb-1 text-muted small">Total Views</p>
                                <h4 class="mb-1 fw-bold">{{ number_format($totalViews) }}</h4>
                                <p class="mb-0">Dilihat pengguna</p>
                            </div>
                            <span class="avatar p-2 me-sm-6">
                                <span class="avatar-initial rounded">
                                    <i class="icon-base ti tabler-chart-bar icon-28px text-heading"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <!-- Total Categories -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0">
                            <div>
                                <p class="mb-1 text-muted small">Categories</p>
                                <h4 class="mb-1 fw-bold">{{ $totalCategories }}</h4>
                                <p class="mb-0">Kategori aktif</p>
                            </div>
                            <span class="avatar p-2 me-sm-6">
                                <span class="avatar-initial rounded">
                                    <i class="icon-base ti tabler-layout-grid icon-28px text-heading"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start pb-4 pb-sm-0 w-100">
                            <div class="w-100 pe-3">
                                <p class="mb-1 text-muted small">Disk Project</p>
                                <h4 class="mb-1 fw-bold">{{ $diskUsage }}</h4>
                                <p class="mb-2">Total penggunaan storage project</p>

                                {{-- Progress bar --}}
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $diskPercent }}%" aria-valuenow="{{ $diskPercent }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                                <small class="text-muted">
                                    {{ $diskPercent }}% dari batas storage
                                </small>
                            </div>

                            <span class="avatar p-2">
                                <span class="avatar-initial rounded">
                                    <i class="icon-base ti tabler-folder icon-28px text-heading"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-transparent border-0">
            <h5 class="fw-bold">Top 5 Most Viewed Projects</h5>
        </div>

        <div class="card-body">
            <ul class="list-group">
                @foreach ($topViews as $project)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $project->title }}</span>
                    <span class="fw-bold">{{ number_format($project->views) }} views</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-transparent border-0">
            <h5 class="fw-bold">Views Analytics (7 Latest Projects)</h5>
        </div>

        <div class="card-body">
            <canvas id="viewsChart" height="120"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('viewsChart').getContext('2d');

        const viewsChart = new Chart(ctx, {
            type: 'line'
            , data: {
                labels: @json($chartLabels)
                , datasets: [{
                    label: 'Views'
                    , data: @json($chartViews)
                    , borderWidth: 2
                    , tension: 0.4
                }]
            }
        });

    </script>

</div>

@endsection
