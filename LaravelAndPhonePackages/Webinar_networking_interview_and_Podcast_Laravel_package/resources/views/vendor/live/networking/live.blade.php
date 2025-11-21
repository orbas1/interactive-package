@extends('layouts.app')

@section('title', 'Networking Live Session')

@section('content')
<div class="container-fluid py-3" id="networking-live" data-session-id="{{ $session['id'] ?? 1 }}">
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <div class="text-muted">Current Round</div>
                            <div class="h4" id="round-indicator">Round 1 of 6</div>
                        </div>
                        <div class="text-end">
                            <div class="text-muted">Time left</div>
                            <div class="display-6" id="round-timer">02:00</div>
                        </div>
                    </div>
                    <div id="networking-video-container" class="border rounded bg-dark text-white p-5 text-center">
                        Video/chat tiles placeholder
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Your partner</h5>
                        <span class="badge bg-light text-dark" id="partner-industry">Marketing</span>
                    </div>
                    <div id="partner-card" class="border rounded p-3 mb-3">
                        <div class="fw-semibold" id="partner-name">Jamie Doe</div>
                        <div class="text-muted" id="partner-role">Growth Lead at Acme</div>
                        <div class="small" id="partner-links">LinkedIn, Website</div>
                    </div>
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" id="partner-notes" rows="3" placeholder="Key takeaways"></textarea>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-outline-secondary" id="skip-round">Skip Round</button>
                        <button class="btn btn-outline-danger" id="report-partner">Report</button>
                        <button class="btn btn-primary ms-auto" id="leave-session">Leave Session</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="fw-semibold mb-2">Next up</div>
                    <div class="text-muted" id="next-up">We will rotate you automatically.</div>
                </div>
            </div>
            @include('vendor.live.components.notes_sidebar')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/networkingLive.js') }}"></script>
@endpush
