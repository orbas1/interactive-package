@extends('layouts.app')

@section('title', $webinar['title'] ?? 'Webinar')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('wnip.webinars.index') ?? '#' }}">Webinars</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $webinar['title'] ?? 'Detail' }}</li>
    </ol>
</nav>
@endsection

@section('content')
@php
    $webinar = $webinar ?? [
        'title' => 'Designing with AI',
        'host' => 'Alice Johnson',
        'datetime' => 'May 5, 6pm GMT',
        'duration' => '60 mins',
        'price' => 'Free',
        'description' => 'Learn how to design products with AI assistance.',
        'agenda' => ['Introduction', 'Live demo', 'Q&A'],
        'speakers' => [
            ['name' => 'Alice Johnson', 'title' => 'Lead Designer'],
            ['name' => 'Ben Watts', 'title' => 'AI Specialist'],
        ],
        'recordings' => [['title' => 'Previous Session', 'date' => 'Mar 3', 'href' => '#']],
    ];
@endphp
<div class="container py-4" id="webinar-detail" data-register-url="{{ route('wnip.webinars.register', ['webinar' => $webinar['id'] ?? 1]) ?? '#' }}">
    <div class="row g-4">
        <div class="col-lg-8">
            <h1 class="mb-2">{{ $webinar['title'] }}</h1>
            <div class="text-muted mb-3">Hosted by {{ $webinar['host'] }} • {{ $webinar['datetime'] }} • {{ $webinar['duration'] }}</div>
            <div class="mb-4">
                <h5>Description</h5>
                <p>{!! nl2br(e($webinar['description'])) !!}</p>
            </div>
            <div class="mb-4">
                <h5>Agenda</h5>
                <ul class="list-unstyled">
                    @foreach($webinar['agenda'] as $item)
                        <li class="d-flex align-items-center mb-2"><span class="badge bg-light text-dark me-2">•</span>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-4">
                <h5>Speakers</h5>
                <div class="row g-3">
                    @foreach($webinar['speakers'] as $speaker)
                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <div class="fw-semibold">{{ $speaker['name'] }}</div>
                                <div class="text-muted">{{ $speaker['title'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if(!empty($webinar['recordings']))
                <div class="mb-4">
                    <h5>Past recordings</h5>
                    <ul class="list-group">
                        @foreach($webinar['recordings'] as $recording)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $recording['title'] }} — {{ $recording['date'] }}</span>
                                <a href="{{ $recording['href'] }}" class="btn btn-sm btn-outline-primary">Watch Replay</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-4">
            <div class="card mb-3" id="registration-panel">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2 align-items-center">
                        <div class="fw-semibold">Registration</div>
                        <span class="badge bg-success">{{ $webinar['price'] }}</span>
                    </div>
                    <div class="mb-3 text-muted small">Secure your spot. Timezone adjusted automatically.</div>
                    <div class="d-grid gap-2" id="registration-actions">
                        <button class="btn btn-primary" data-action="register">Register</button>
                        <button class="btn btn-outline-secondary d-none" data-action="join">Join Waiting Room</button>
                        <div class="alert alert-success d-none mb-0" role="alert">You're registered.</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="fw-semibold mb-2">Share</div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm">Copy Link</button>
                        <button class="btn btn-outline-secondary btn-sm">Twitter</button>
                        <button class="btn btn-outline-secondary btn-sm">LinkedIn</button>
                    </div>
                </div>
            </div>
            <div class="card mt-3" id="countdown-card">
                <div class="card-body">
                    <div class="fw-semibold mb-1">Starts in</div>
                    <div id="webinar-countdown" class="display-6">--:--:--</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/webinarDetail.js') }}"></script>
@endpush
