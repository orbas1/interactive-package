@extends('layouts.app')

@section('title', 'Webinar Waiting Room')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('wnip.webinars.index') ?? '#' }}">Webinars</a></li>
        <li class="breadcrumb-item active" aria-current="page">Waiting Room</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container py-4" id="webinar-waiting-room" data-live-url="{{ route('wnip.webinars.live', ['webinar' => $webinar['id'] ?? 1]) ?? '#' }}">
    @include('vendor.live.components.waiting_room_header', [
        'title' => $webinar['title'] ?? 'Upcoming Webinar',
        'host' => $webinar['host'] ?? 'Host',
        'start' => $webinar['datetime'] ?? 'Starts soon',
        'status' => 'Waiting room open'
    ])

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <div class="text-muted">Starts in</div>
                            <div id="waiting-countdown" class="display-5">--:--:--</div>
                        </div>
                        <div class="text-end">
                            <div class="badge bg-secondary">Connection check</div>
                            <div class="text-success small mt-1" id="connection-status">You're good to go</div>
                        </div>
                    </div>
                    <div class="alert alert-info" id="host-announcements">Host will share announcements here.</div>
                    <button class="btn btn-primary w-100" id="enter-webinar" disabled>Open Live Session</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            @include('vendor.live.components.notes_sidebar')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/webinarDetail.js') }}"></script>
@endpush
