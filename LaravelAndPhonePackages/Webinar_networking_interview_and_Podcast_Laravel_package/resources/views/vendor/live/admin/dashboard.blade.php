@extends('layouts.admin')

@section('title', 'Live & Events Dashboard')

@section('content')
<div class="container-fluid py-4" id="admin-live-dashboard">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Live & Events</h1>
            <p class="text-muted mb-0">Monitor webinars, networking, podcasts, and interviews</p>
        </div>
        <button class="btn btn-outline-secondary">Refresh</button>
    </div>

    <div class="row g-3 mb-4">
        @php
            $stats = [
                ['label' => 'Upcoming webinars', 'value' => 12],
                ['label' => 'Networking events', 'value' => 6],
                ['label' => 'Interviews this week', 'value' => 18],
                ['label' => 'Hours recorded', 'value' => 240],
            ];
        @endphp
        @foreach($stats as $stat)
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="text-muted small">{{ $stat['label'] }}</div>
                        <div class="display-6">{{ $stat['value'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">Upcoming events</div>
                <div class="table-responsive">
                    <table class="table mb-0" id="admin-events-table">
                        <thead><tr><th>Type</th><th>Title</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
                        <tbody>
                            <tr><td>Webinar</td><td>Designing with AI</td><td>May 5</td><td><span class="badge bg-warning">Live soon</span></td><td><button class="btn btn-sm btn-outline-primary">Manage</button></td></tr>
                            <tr><td>Networking</td><td>Fintech founders</td><td>May 4</td><td><span class="badge bg-success">Live</span></td><td><button class="btn btn-sm btn-outline-primary">Manage</button></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Issues & Logs</div>
                <div class="card-body">
                    <ul class="mb-0" id="issue-log">
                        <li>Recording failed for Webinar #13</li>
                        <li>Flagged behaviour in Networking #7</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header">Attendance stats</div>
                <div class="card-body">
                    <div id="admin-metrics" class="text-center text-muted">Charts placeholder</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/adminLiveDashboard.js') }}"></script>
@endpush
