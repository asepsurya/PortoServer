@extends('layouts.app')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="post-list">

        <!-- Item -->
        <div class="post-item d-flex justify-content-between align-items-start p-3 mb-3 rounded border">
            
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
                    <i class="ti ti-share"></i>

                    <!-- Comment -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="ti ti-message-circle"></i> 0
                    </div>

                    <!-- Views -->
                    <div class="d-flex align-items-center gap-1">
                        <i class="ti ti-chart-bar"></i> 137
                    </div>

                </div>
            </div>
        </div>
        <!-- /Item -->

    </div>
</div>
@endsection