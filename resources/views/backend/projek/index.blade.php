@extends('layouts.app')
@section('title', 'Projek Saya')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">

    {{-- Judul Kiri --}}
    <h4 class="page-title mb-0">Projek Saya</h4>

    {{-- Tombol Kanan --}}
    <a href="{{ route('project.add') }}" class="btn btn-primary">
        <i class="icon-base ti tabler-plus icon-22px   me-1"></i>
        Tambah
    </a>

</div>

    <div class="post-list">
        @foreach($projects as $project)
        <!-- Item -->
       
        <div class="post-item d-flex justify-content-between align-items-start p-3 mb-3 rounded border bg-white dark:bg-black">
            
            <!-- Left -->
            <div class="d-flex">
                <!-- Thumbnail -->
              <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('img/no-image.jpg') }}"
                    width="100" height="100"
                    class="img-fluid rounded mb-2 me-3"
                    alt="Project Image">

                <div>
                     <a href="/project/{{ $project->slug }}">
                    <!-- Title -->
                    <h5 class="mb-1 fw-semibold">
                       {{ $project->title }}
                    </h5>
                     </a>

                    <!-- Meta -->
                   <div class="text-muted small mb-2">
                        Dipublikasikan • {{ \Carbon\Carbon::parse($project->created_at)->format('d F Y') }}
                    </div>

                   
                    <!-- Tags -->
            
                @foreach($project->category() as $category)
                        <a href="{{ url('/project?category=' . $category->id) }}">
                            <span class="badge rounded-pill bg-light text-dark border">{{ $category->name }}   </span></a>
                    @endforeach
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
        
        @endforeach
      
        <!-- /Item -->

    </div>
</div>
@endsection