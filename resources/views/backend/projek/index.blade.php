@extends('layouts.app')
@section('title', 'Projek Saya')
@section('container')
<style>
    .post-item .hover-actions {
        opacity: 0;
        transition: 0.25s ease-in-out;
    }

    .post-item:hover .hover-actions {
        opacity: 1;
    }

</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">

        {{-- Judul Kiri --}}
        {{-- <h4 class="page-title mb-0">Projek Saya</h4> --}}
        <div><button type="submit" class="btn btn-danger"  onclick="confirmDelete()" onclick="return confirm('Yakin hapus project yang dipilih?')">Hapus Terpilih</button></div>
        <script>
            function confirmDelete() {
                if(confirm('Yakin hapus project yang dipilih?')) {
                    document.getElementById('delete-multiple-form').submit();
                }
            }
            </script>
        {{-- Tombol Kanan --}}
        <a href="{{ route('project.add') }}" class="btn btn-primary">
            <i class="icon-base ti tabler-plus icon-22px   me-1"></i>
            Tambah
        </a>

    </div>

    <div class="post-list">

        <!-- Form untuk hapus massal -->
        <form action="/project/delete-multiple" method="POST" id="delete-multiple-form">
            @csrf
          
            @forelse($projects as $project)

            <!-- Item -->
            <div class="post-item position-relative d-flex justify-content-between align-items-start p-3 mb-3 rounded border bg-white dark:bg-black">
                <!-- LEFT -->
                <div class="d-flex ">
                    <input class="form-check-input select-project me-4" type="checkbox" name="projects[]" value="{{ $project->id }}">
                    <!-- Thumbnail -->
                    <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('img/no-image.jpg') }}" width="100" height="100" class="img-fluid rounded mb-2 me-3" alt="Project Image">

                    <div>
                        <a href="/project/{{ $project->slug }}">
                            <h5 class="mb-1 fw-semibold">{{ $project->title }}</h5>
                        </a>

                        <div class="text-muted small mb-2">
                            @if($project->status == 0)
                            <span class="text-primary">Draft •</span>
                            @else
                            <span class="text-primary">Dipublikasikan •</span>
                            @endif
                            {{ \Carbon\Carbon::parse($project->created_at)->format('d F Y') }}
                        </div>

                        <!-- Tags -->
                        @foreach($project->category() as $category)
                        <a href="{{ url('/project?category=' . $category->id) }}">
                            <span class="badge rounded-pill bg-light text-dark border">{{ $category->name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="text-end d-flex flex-column align-items-end justify-content-between">
                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div class="hover-actions d-flex gap-2 mt-1">
                            <a href="/project/{{ $project->slug }}" class="text-primary">
                                <i class="ti icon-base tabler-edit icon-22px"></i>
                            </a>
                            @if($project->status == 0)
                            <!-- Tombol Publikasikan hanya icon -->
                              <a href="/project/{{ $project->id }}/publish" type="submit" " data-bs-toggle="tooltip" data-bs-placement="top" title="Publikasikan Project">
                                    <i class="icon-base ti tabler-send icon-22px"></i>
                                </a>
                            @else
                            <!-- Tombol Ubah Draft hanya icon -->
                            
                                <a href="/project/{{ $project->id }}/draft" type="submit" " data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah ke Draft">
                                    <i class="ti icon-base tabler-alert-circle icon-22px"></i>
                                </a>
                            
                             @endif
                        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                            tooltipTriggerList.map(function (tooltipTriggerEl) {
                                return new bootstrap.Tooltip(tooltipTriggerEl)
                            });
                        });
                        </script>



                        </div>
                        <img src="{{ asset('img/user.jpg') }}" class="author-photo rounded-circle mb-2" width="50">
                    </div>

                    <!-- Stats -->
                    <div class="d-flex align-items-center gap-3 text-muted small mt-2">
                        <div class="dropdown">
                            <a href="#" class="text-muted" data-bs-toggle="dropdown">
                                <i class="ti icon-base tabler-share icon-22px text-heading"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/portofolio/detail/'.$project->slug)) }}" target="_blank">
                                        <i class="ti icon-base tabler-brand-facebook"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="https://twitter.com/intent/tweet?url={{ urlencode(url('/portofolio/detail/'.$project->slug)) }}" target="_blank">
                                        <i class="ti icon-base tabler-brand-twitter"></i> Twitter / X
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="https://wa.me/?text={{ urlencode(url('/portofolio/detail/'.$project->slug)) }}" target="_blank">
                                        <i class="ti icon-base tabler-brand-whatsapp"></i> WhatsApp
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center gap-2" onclick="copyShareLink()">
                                        <i class="ti icon-base tabler-copy"></i> Copy Link
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="d-flex align-items-center gap-1">
                            <i class="icon-base ti tabler-message-circle icon-22px text-heading"></i> 0
                        </div>

                        <div class="d-flex align-items-center gap-1">
                            <i class="icon-base ti tabler-chart-bar icon-22px text-heading"></i> {{ $project->views }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Item -->

            @empty
            <div class="text-center py-5">
                <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-3 opacity-75">
                    <path d="M3 7H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M5 7L6 19H18L19 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M9 7V5C9 3.895 9.895 3 11 3H13C14.105 3 15 3.895 15 5V7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <h5 class="fw-semibold">Tidak ada project ditemukan</h5>
                <p class="text-muted">Silakan tambahkan project baru untuk mulai menampilkan konten.</p>
            </div>
            @endforelse

            <div class="d-flex justify-content-between align-items-center mt-3">
                
                <div>
                    {{ $projects->links() }}
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JS: Select All -->
    <script>
        // Contoh menambahkan "Select All"
        const checkboxes = document.querySelectorAll('.select-project');

    </script>


</div>
<script>
    function copyShareLink() {
        navigator.clipboard.writeText("{{ url('/portofolio/detail/'.$project->slug) }}");
        alert("Link copied!");
    }

</script>

@endsection
