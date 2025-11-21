@extends('layouts.app')

@section('title', 'Networking Sessions')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Networking</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container py-4" id="networking-catalogue" data-fetch-url="{{ route('wnip.networking.index') ?? '#' }}">
    <div class="d-flex align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h1 class="mb-1">Networking Sessions</h1>
            <div class="text-muted">Meet peers in speed or group networking</div>
        </div>
        <div class="ms-auto d-flex gap-2 align-items-center">
            <select class="form-select" name="type">
                <option value="">All types</option>
                <option value="speed">Speed networking</option>
                <option value="group">Group networking</option>
            </select>
            <select class="form-select" name="price">
                <option value="">All</option>
                <option value="free">Free</option>
                <option value="paid">Paid</option>
            </select>
        </div>
    </div>

    @php
        $sessions = $sessions ?? [
            ['title' => 'Fintech founders', 'host' => 'Nia', 'datetime' => 'May 4, 5pm', 'type' => 'Speed', 'rotation' => '2 min', 'spots' => 12, 'status' => 'Live'],
            ['title' => 'Design leaders', 'host' => 'Omar', 'datetime' => 'May 12, 6pm', 'type' => 'Group', 'rotation' => '5 min', 'spots' => 5, 'status' => 'Scheduled'],
        ];
    @endphp

    <div class="row g-3" id="networking-cards">
        @foreach($sessions as $session)
            <div class="col-md-4">
                @include('vendor.live.components.event_card', [
                    'title' => $session['title'],
                    'host' => $session['host'],
                    'datetime' => $session['datetime'],
                    'tag' => $session['type'],
                    'status' => $session['status'],
                    'description' => $session['rotation'] . ' rotations • ' . $session['spots'] . ' spots left',
                    'href' => route('wnip.networking.show', ['session' => $loop->index + 1]) ?? '#',
                    'cta' => $session['status'] === 'Live' ? 'Join Now' : 'View Details'
                ])
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/networkingCatalogue.js') }}"></script>
@endpush
