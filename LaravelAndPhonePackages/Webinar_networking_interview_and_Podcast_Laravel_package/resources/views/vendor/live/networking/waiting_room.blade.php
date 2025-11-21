@extends('layouts.app')

@section('title', 'Networking Waiting Room')

@section('content')
<div class="container py-4" id="networking-waiting-room" data-live-url="{{ route('wnip.networking.live', ['session' => $session['id'] ?? 1]) ?? '#' }}">
    @include('vendor.live.components.waiting_room_header', [
        'title' => $session['title'] ?? 'Networking session',
        'host' => $session['host'] ?? 'Host',
        'start' => $session['schedule'] ?? 'Starts soon',
        'status' => 'Waiting'
    ])

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="text-muted">Starts in</div>
                            <div id="networking-countdown" class="display-5">--:--:--</div>
                        </div>
                        <div class="text-end">
                            <div class="badge bg-secondary">Participants</div>
                            <div class="small" id="participant-count">0 waiting</div>
                        </div>
                    </div>
                    <ul class="list-group mb-3" id="participant-list">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Jane • Product Lead (London)</span>
                            <span class="badge bg-light text-dark">Fintech</span>
                        </li>
                    </ul>
                    <button class="btn btn-primary w-100" id="join-networking" disabled>Join Session</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h6>Business card</h6>
                    <form class="d-grid gap-2" id="waiting-card-form">
                        <input class="form-control" name="headline" placeholder="Headline" />
                        <input class="form-control" name="city" placeholder="City" />
                        <textarea class="form-control" name="links" rows="2" placeholder="Links"></textarea>
                        <button class="btn btn-outline-primary" type="submit">Save Card</button>
                    </form>
                </div>
            </div>
            @include('vendor.live.components.notes_sidebar')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module" src="{{ mix('js/live/networkingCatalogue.js') }}"></script>
@endpush
