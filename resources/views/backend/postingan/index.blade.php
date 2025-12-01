@extends('layouts.app')
@section('title', 'Postingan')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
 
    <div class="d-flex justify-content-between align-items-center mb-3">

    {{-- Judul Kiri --}}
    <h4 class="page-title mb-0">Postingan</h4>

    {{-- Tombol Kanan --}}
    <a href="{{ route('posts.add') }}" class="btn btn-primary">
        <i class="icon-base ti tabler-plus icon-22px   me-1"></i>
        Tambah
    </a>

</div>
    <div class="post-list">

        <!-- Item -->
        <div class="post-item d-flex justify-content-between align-items-start p-3 mb-3 rounded border bg-white dark:bg-black">
            
            <!-- Left -->
            <div class="d-flex">
                <!-- Thumbnail -->
                <img src="{{ asset('') }}" class="post-thumb rounded me-3">

                <div>
                    <!-- Title -->
                    <h5 class="mb-1 fw-semibold">
                        Kode Crash Team Racing Playstation (Cheat CTR PS1)
                    </h5>

                    <!-- Meta -->
                    <div class="text-muted small mb-2">
                        Dipublikasikan • 27 Jan
                    </div>

                    <!-- Tags -->
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge rounded-pill bg-light text-dark border">game-ringan</span>
                        <span class="badge rounded-pill bg-light text-dark border">games</span>
                    </div>
                </div>
            </div>

            <!-- Right Info -->
            <div class="text-end d-flex flex-column align-items-end justify-content-between">

                <!-- Author -->
                <div class="fw-semibold">Arareita</div>
                <img src="https://i.pravatar.cc/40" class="author-photo rounded-circle mb-2">

                <!-- Actions -->
                <div class="d-flex align-items-center gap-3 text-muted small">

                    <!-- Share -->
                  <i class="icon-base ti tabler-share icon-22px text-heading"></i>

                    <!-- Comment -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-message-circle icon-22px text-heading "></i> 0
                    </div>

                    <!-- Views -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-chart-bar icon-22px text-heading "></i> 137
                    </div>

                </div>
            </div>
        </div>
        <div class="post-item d-flex justify-content-between align-items-start p-3 mb-3 rounded border bg-white dark:bg-black">
            
            <!-- Left -->
            <div class="d-flex">
                <!-- Thumbnail -->
                <img src="{{ asset('') }}" class="post-thumb rounded me-3">

                <div>
                    <!-- Title -->
                    <h5 class="mb-1 fw-semibold">
                        Kode Crash Team Racing Playstation (Cheat CTR PS1)
                    </h5>

                    <!-- Meta -->
                    <div class="text-muted small mb-2">
                        Dipublikasikan • 27 Jan
                    </div>

                    <!-- Tags -->
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge rounded-pill bg-light text-dark border">game-ringan</span>
                        <span class="badge rounded-pill bg-light text-dark border">games</span>
                    </div>
                </div>
            </div>

            <!-- Right Info -->
            <div class="text-end d-flex flex-column align-items-end justify-content-between">

                <!-- Author -->
                <div class="fw-semibold">Arareita</div>
                <img src="https://i.pravatar.cc/40" class="author-photo rounded-circle mb-2">

                <!-- Actions -->
                <div class="d-flex align-items-center gap-3 text-muted small">

                    <!-- Share -->
                  <i class="icon-base ti tabler-share icon-22px text-heading"></i>

                    <!-- Comment -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-message-circle icon-22px text-heading "></i> 0
                    </div>

                    <!-- Views -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-chart-bar icon-22px text-heading "></i> 137
                    </div>

                </div>
            </div>
        </div>
        <div class="post-item d-flex justify-content-between align-items-start p-3 mb-3 rounded border bg-white dark:bg-black">
            
            <!-- Left -->
            <div class="d-flex">
                <!-- Thumbnail -->
                <img src="{{ asset('') }}" class="post-thumb rounded me-3">

                <div>
                    <!-- Title -->
                    <h5 class="mb-1 fw-semibold">
                        Kode Crash Team Racing Playstation (Cheat CTR PS1)
                    </h5>

                    <!-- Meta -->
                    <div class="text-muted small mb-2">
                        Dipublikasikan • 27 Jan
                    </div>

                    <!-- Tags -->
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge rounded-pill bg-light text-dark border">game-ringan</span>
                        <span class="badge rounded-pill bg-light text-dark border">games</span>
                    </div>
                </div>
            </div>

            <!-- Right Info -->
            <div class="text-end d-flex flex-column align-items-end justify-content-between">

                <!-- Author -->
                <div class="fw-semibold">Arareita</div>
                <img src="https://i.pravatar.cc/40" class="author-photo rounded-circle mb-2">

                <!-- Actions -->
                <div class="d-flex align-items-center gap-3 text-muted small">

                    <!-- Share -->
                  <i class="icon-base ti tabler-share icon-22px text-heading"></i>

                    <!-- Comment -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-message-circle icon-22px text-heading "></i> 0
                    </div>

                    <!-- Views -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-chart-bar icon-22px text-heading "></i> 137
                    </div>

                </div>
            </div>
        </div>
        <div class="post-item d-flex justify-content-between align-items-start p-3 mb-3 rounded border bg-white dark:bg-black">
            
            <!-- Left -->
            <div class="d-flex">
                <!-- Thumbnail -->
                <img src="{{ asset('') }}" class="post-thumb rounded me-3">

                <div>
                    <!-- Title -->
                    <h5 class="mb-1 fw-semibold">
                        Kode Crash Team Racing Playstation (Cheat CTR PS1)
                    </h5>

                    <!-- Meta -->
                    <div class="text-muted small mb-2">
                        Dipublikasikan • 27 Jan
                    </div>

                    <!-- Tags -->
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge rounded-pill bg-light text-dark border">game-ringan</span>
                        <span class="badge rounded-pill bg-light text-dark border">games</span>
                    </div>
                </div>
            </div>

            <!-- Right Info -->
            <div class="text-end d-flex flex-column align-items-end justify-content-between">

                <!-- Author -->
                <div class="fw-semibold">Arareita</div>
                <img src="https://i.pravatar.cc/40" class="author-photo rounded-circle mb-2">

                <!-- Actions -->
                <div class="d-flex align-items-center gap-3 text-muted small">

                    <!-- Share -->
                  <i class="icon-base ti tabler-share icon-22px text-heading"></i>

                    <!-- Comment -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-message-circle icon-22px text-heading "></i> 0
                    </div>

                    <!-- Views -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="icon-base ti tabler-chart-bar icon-22px text-heading "></i> 137
                    </div>

                </div>
            </div>
        </div>
        <!-- /Item -->

    </div>
</div>
@endsection