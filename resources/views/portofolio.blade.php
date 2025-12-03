@extends('layouts.front')
@section('container')
    <section class="portfolio section-padding">
        <div class="container">
            <div class="sec-head mb-40">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="d-inline-block">
                            <div class="sub-title-icon d-flex align-items-center">
                                <span class="icon pe-7s-portfolio"></span>
                                <h6>My Portfolio</h6>
                            </div>
                        </div>
                        <h3>Helping digital brands <br> scale with design.</h3>
                    </div>
                </div>
            </div>
            {{-- resources/views/partials/filter-tabs.blade.php --}}
            @php
                $currentCategory = request('category');
                $baseUrl = url()->current();
            @endphp

            <div class="d-flex justify-content-center mb-4">
                <ul class="nav nav-pills gap-2 p-2 rounded-pill bg-black shadow-lg d-inline-flex" role="tablist"
                    style="backdrop-filter: blur(6px); border: 1px solid #222;">

                    {{-- All --}}
                    <li class="nav-item">
                        <a class="nav-link rounded-pill px-4 py-2 fw-semibold
                {{ is_null($currentCategory) ? 'active text-white' : 'text-light' }}"
                            href="{{ $baseUrl }}">
                            All
                        </a>
                    </li>

                    {{-- Loop categories --}}
                    @foreach ($categories as $cat)
                        @php
                            $isActive = $currentCategory !== null && (string) $currentCategory === (string) $cat->id;
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link rounded-pill px-4 py-2 fw-semibold
                    {{ $isActive ? 'active text-white' : 'text-light' }}"
                                href="{{ request()->fullUrlWithQuery(['category' => $cat->id]) }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="gallery">
                <div class="row">
                    @foreach ($project->where('status','1') as $item)
                        <div class="col-lg-4 items">
                            <div class="item">
                                <div class="img">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('img/no-signal.jpg') }}"
                                        alt="">
                                    <a href="{{ route('porto.detail', $item->slug) }}" class="link"></a>
                                </div>
                                <div class="cont d-flex align-items-center">
                                    <div>
                                        <h6>{{ $item->title }}</h6>
                                        @foreach ($item->category() as $category)
                                            <a href="{{ url('/portofolio?category=' . $category->id) }}">
                                                <span class="tag">{{ $category->name }} </span>
                                            </a>
                                        @endforeach

                                    </div>
                                    <div class="ml-auto">
                                        <div class="arrow">
                                            <a href="{{ route('porto.detail', $item->slug) }}">
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;">
                                                    <line x1="0" y1="16" x2="33" y2="16">
                                                    </line>
                                                    <line x1="17.3" y1="0.7" x2="33.2" y2="16.5">
                                                    </line>
                                                    <line x1="17.3" y1="31.6" x2="33.5" y2="15.4">
                                                    </line>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
