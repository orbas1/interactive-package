@extends('layouts.app')

@section('title', 'Webinars')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Webinars</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container py-4" id="webinar-catalogue" data-fetch-url="{{ route('wnip.webinars.index') ?? '#' }}">
    <div class="d-flex align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h1 class="mb-1">Webinars</h1>
            <div class="text-muted">Discover upcoming & past sessions</div>
        </div>
        <div class="ms-auto d-flex gap-2 align-items-center">
            <div class="btn-group" role="group" aria-label="Filters">
                <button class="btn btn-outline-primary active" data-filter="upcoming">Upcoming</button>
                <button class="btn btn-outline-primary" data-filter="past">Past</button>
                <button class="btn btn-outline-primary" data-filter="mine">My Webinars</button>
            </div>
            <a class="btn btn-primary" href="{{ route('wnip.webinars.create') ?? '#' }}">Host a Webinar</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="search" class="form-control" placeholder="Title or host" name="search">
            </div>
            <div class="col-md-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category">
                    <option value="">All</option>
                    <option>Engineering</option>
                    <option>Marketing</option>
                    <option>Product</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date range</label>
                <input type="date" class="form-control" name="from">
            </div>
            <div class="col-md-3">
                <label class="form-label">Price</label>
                <select class="form-select" name="price">
                    <option value="">All</option>
                    <option value="free">Free</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
        </div>
    </div>

    @php
        $webinars = $webinars ?? [
            ['title' => 'Designing with AI', 'host' => 'Alice', 'datetime' => 'May 5, 6pm', 'tag' => 'Free', 'status' => 'Live'],
            ['title' => 'Scaling APIs', 'host' => 'Bob', 'datetime' => 'May 8, 3pm', 'tag' => 'Paid', 'status' => 'Scheduled'],
            ['title' => 'Mobile UX', 'host' => 'Carol', 'datetime' => 'Apr 20, 2pm', 'tag' => 'Free', 'status' => 'Finished'],
        ];
    @endphp

    <div class="row g-3" id="webinar-cards">
        @foreach($webinars as $webinar)
            <div class="col-md-4">
                @include('vendor.live.components.event_card', [
                    'title' => $webinar['title'],
                    'host' => $webinar['host'],
                    'datetime' => $webinar['datetime'],
                    'tag' => $webinar['tag'],
                    'status' => $webinar['status'],
                    'href' => route('wnip.webinars.show', ['webinar' => $loop->index + 1]) ?? '#'
                ])
            </div>
        @endforeach
    </div>
    <div class="mt-4 text-center" id="webinar-pagination">
        <button class="btn btn-outline-secondary">Load more</button>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/webinarCatalogue.js') }}"></script>
@endpush
