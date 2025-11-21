@extends('layouts.app')

@section('title', 'Interview Waiting Room')

@section('content')
<div class="container py-4" id="interview-waiting-room" data-live-url="{{ route('wnip.interviews.live', ['interview' => $interview['id'] ?? 1]) ?? '#' }}">
    @include('vendor.live.components.waiting_room_header', [
        'title' => $interview['role'] ?? 'Interview',
        'host' => $interview['company'] ?? 'Company',
        'start' => $interview['datetime'] ?? 'Starts soon',
        'status' => 'Waiting'
    ])

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Starts in</div>
                    <div id="interview-countdown" class="display-5">--:--:--</div>
                    <div class="mt-3">
                        <h6>Tips</h6>
                        <ul class="mb-0">
                            <li>Find a quiet space.</li>
                            <li>Test your audio and camera.</li>
                            <li>Keep notes handy.</li>
                        </ul>
                    </div>
                    <button class="btn btn-primary w-100 mt-3" id="enter-interview" disabled>Enter Interview</button>
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
<script type="module" src="{{ mix('js/live/interviewDashboard.js') }}"></script>
@endpush
