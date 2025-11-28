<!-- resources/views/portfolio/index.blade.php -->
@extends('layouts.app')

@section('content')
    <x-hero />
    <x-projects-section :projects="$projects" :tags="$tags" />
    <x-contact />
@endsection