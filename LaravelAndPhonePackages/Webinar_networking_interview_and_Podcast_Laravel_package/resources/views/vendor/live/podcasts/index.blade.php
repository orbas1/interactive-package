@extends('layouts.app')

@section('title', 'Podcasts')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Podcasts</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container py-4" id="podcast-catalogue">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Podcast Catalogue</h1>
            <p class="text-muted mb-0">Listen to live & on-demand podcasts</p>
        </div>
        <div class="d-flex gap-2">
            <input class="form-control" placeholder="Search" name="search" />
            <select class="form-select" name="category">
                <option value="">All</option>
                <option>Business</option>
                <option>Tech</option>
            </select>
            <select class="form-select" name="host">
                <option value="">Any host</option>
                <option>Featured</option>
            </select>
        </div>
    </div>

    @php
        $series = $series ?? [
            ['title' => 'Product Stories', 'tagline' => 'Behind the roadmap', 'host' => 'Kim', 'href' => '#'],
            ['title' => 'Growth Weekly', 'tagline' => 'Scaling experiments', 'host' => 'Lee', 'href' => '#'],
        ];
    @endphp

    <div class="row g-3">
        @foreach($series as $podcast)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="ratio ratio-16x9 bg-light rounded mb-3"></div>
                        <h5 class="card-title">{{ $podcast['title'] }}</h5>
                        <p class="text-muted">{{ $podcast['tagline'] }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-dark">Host: {{ $podcast['host'] }}</span>
                            <a href="{{ route('wnip.podcasts.series', ['series' => $loop->index + 1]) ?? '#' }}" class="btn btn-outline-primary btn-sm">Start Listening</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
