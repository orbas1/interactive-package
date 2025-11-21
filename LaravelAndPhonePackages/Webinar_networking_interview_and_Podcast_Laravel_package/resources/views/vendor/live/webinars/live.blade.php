@extends('layouts.app')

@section('title', 'Webinar Live Session')

@section('content')
<div class="container-fluid py-3" id="webinar-live" data-session-id="{{ $webinar['id'] ?? 1 }}">
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body p-0">
                    <div id="webinar-video-container" class="ratio ratio-16x9 bg-dark text-white d-flex align-items-center justify-content-center">
                        <div>Video stream will appear here</div>
                    </div>
                    <div id="webinar-whiteboard" class="border-top p-3 bg-light">Whiteboard/Slides placeholder</div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <span class="badge bg-danger me-2" id="live-status">Live</span>
                        <span id="attendee-count">0 attendees</span>
                    </div>
                    @include('vendor.live.components.host_tools_toolbar')
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="live-tabs" role="tablist">
                        <li class="nav-item" role="presentation"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#chat" type="button" role="tab">Chat</button></li>
                        <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#qa" type="button" role="tab">Q&amp;A</button></li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="chat" role="tabpanel">
                            @include('vendor.live.components.live_chat_panel')
                        </div>
                        <div class="tab-pane fade" id="qa" role="tabpanel">
                            <div id="qa-list" class="mb-3">
                                <div class="text-muted">Submit and upvote questions.</div>
                            </div>
                            <form id="qa-form" class="d-flex gap-2">
                                <input class="form-control" name="question" placeholder="Ask a question" />
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
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
<script type="module" src="{{ mix('js/live/webinarLive.js') }}"></script>
@endpush
