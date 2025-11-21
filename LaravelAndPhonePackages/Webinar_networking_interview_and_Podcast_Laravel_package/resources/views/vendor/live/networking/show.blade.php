@extends('layouts.app')

@section('title', $session['title'] ?? 'Networking Session')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('wnip.networking.index') ?? '#' }}">Networking</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $session['title'] ?? 'Detail' }}</li>
    </ol>
</nav>
@endsection

@section('content')
@php
    $session = $session ?? [
        'title' => 'Fintech founders networking',
        'host' => 'Nia Maxwell',
        'type' => 'Speed (2 min rotations)',
        'description' => 'Connect quickly with founders and investors in fintech.',
        'schedule' => 'May 4, 5pm',
        'capacity' => 40,
        'registered' => 32,
    ];
@endphp
<div class="container py-4" id="networking-detail" data-register-url="{{ route('wnip.networking.register', ['session' => $session['id'] ?? 1]) ?? '#' }}">
    <div class="row g-4">
        <div class="col-lg-8">
            <h1 class="mb-2">{{ $session['title'] }}</h1>
            <div class="text-muted mb-3">Hosted by {{ $session['host'] }} • {{ $session['type'] }}</div>
            <p class="lead">{{ $session['description'] }}</p>
            <div class="mb-4">
                <h5>What to expect</h5>
                <ul class="list-unstyled">
                    <li>Fast introductions every rotation.</li>
                    <li>Swap contact info instantly.</li>
                    <li>Short note field to capture key points.</li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="fw-semibold">Schedule</div>
                    <div class="text-muted">{{ $session['schedule'] }}</div>
                    <div class="mt-2">Capacity: {{ $session['capacity'] }} • Registered: {{ $session['registered'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="fw-semibold mb-2">Your business card</div>
                    <div class="border rounded p-3 mb-2" id="business-card">
                        <div class="fw-semibold">{{ $card['name'] ?? 'Your Name' }}</div>
                        <div class="text-muted">{{ $card['headline'] ?? 'Headline' }}</div>
                        <div>{{ $card['company'] ?? 'Company' }}</div>
                    </div>
                    <button class="btn btn-link p-0" id="edit-card">Edit card</button>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" data-action="register">Register</button>
                        <button class="btn btn-outline-secondary d-none" data-action="waitlist">Join waitlist</button>
                    </div>
                </div>
            </div>
            <div class="card" id="edit-card-form" style="display:none;">
                <div class="card-body">
                    <h6>Edit business card</h6>
                    <form class="d-grid gap-2" id="card-form">
                        <input class="form-control" name="name" placeholder="Name" />
                        <input class="form-control" name="headline" placeholder="Headline" />
                        <input class="form-control" name="company" placeholder="Company" />
                        <textarea class="form-control" name="bio" rows="3" placeholder="Short bio"></textarea>
                        <button class="btn btn-outline-primary" type="submit">Save Card</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/networkingCatalogue.js') }}"></script>
@endpush
