# Agent Instructions – Webinar, Networking, Interview & Podcast Package (Laravel + Flutter)

## Overall Goal

Your goal is to create:

1. A **Laravel package** (`webinar_networking_interview_podcast_laravel_package`), and  
2. A **Flutter mobile addon package** (`webinar_networking_interview_podcast_flutter_addon`),

that together provide the **same webinar, networking, interview and podcast functionality** on both:

- The **Laravel backend / web app**, and  
- The **Flutter mobile app**.

These will plug into an existing **social media style platform**, moving it towards a **LinkedIn-style professional network**.

> ⚠️ Important: **Do not copy any binary files** (e.g. images, fonts, compiled assets, `.exe`, `.dll`, `.so`, etc.).

---

## Source Applications

- Backend source: `connect`  
- Backend/Podcast source: `wavepods`  

We will **copy the necessary logic and structure** from these into:

- `webinar_networking_interview_podcast_laravel_package` (Laravel package)  
- `webinar_networking_interview_podcast_flutter_addon` (Flutter addon package)

The aim is **full feature parity** with the original `connect` (webinar/networking/interviews) and `wavepods` (podcasts) functionality.

---

## Part 1 – Laravel Package (`webinar_networking_interview_podcast_laravel_package`)

We are building a **proper Laravel package** (installable via Composer, likely using a `path` repository). This package will be added into the main social app and must include all files required for **full functionality**.

When extracting from `connect` and `wavepods`, ensure the following areas are copied/refactored into the package:

1. **Config**
   - Package config files (e.g. `config/webinar_networking_podcast.php`).
   - Settings for:
     - Roles and permissions (host, guest, attendee, moderator).
     - Feature toggles (webinars on/off, networking on/off, podcasts on/off, interviews on/off).
     - Paywall / pricing, free vs paid events.
     - Streaming / integration settings (e.g. Zoom/Teams/custom RTMP endpoints).

2. **Database**
   - All required **migrations**, including tables for:
     - Webinars (scheduled/live, metadata, host info).
     - Webinar registrations and attendance logs.
     - Webinar recordings and catalogue.
     - Networking sessions (speed networking, group networking).
     - Networking participants, pairings/rotations, and events.
     - Podcasts (series and episodes).
     - Podcast recordings, catalogue, and playback stats.
     - Interviews (slots, schedules, participants, scoring matrices).
     - Interview scoring, criteria, and question banks.
     - Paywalls / tickets / access passes (for paid events).
   - Any **seeders** necessary for:
     - Default webinar types.
     - Default networking durations (2 min, 5 min).
     - Default scoring matrices / interview templates (if present).

3. **Domains**
   - Domain logic organised by feature area, for example:
     - `Domain/Webinar`
       - Webinar creation, scheduling, management, live state, recording.
       - Free vs paywalled webinars.
       - Waiting room, styling and whiteboard/drawing if available.
       - Screen sharing integration hooks.
     - `Domain/Networking`
       - Speed networking sessions (2 min / 5 min rotations).
       - Free vs paywalled networking sessions.
       - Session management (host tools, start/stop, rotation logic).
       - Business card sharing / contact exchange.
       - Session pages, styling, and schedule.
     - `Domain/Podcast`
       - Podcast series and episodes.
       - Single-person and multi-person podcast flows.
       - Recording management and catalogue.
       - Public podcast pages / showcases.
     - `Domain/Interview`
       - Interview scheduling and multi-person interviews.
       - Waiting room.
       - File sharing (CVs, portfolios) for interviews.
       - Criteria matrix, scoring, and questions list (visible only to interviewers).
       - Interview calendar / calendar integration.
   - Keep each domain cohesive and separated into appropriate namespaces.

4. **Http**
   - Controllers (web + API) for:
     - Managing webinars (create, schedule, edit, cancel, view).
     - Managing networking sessions (create, configure, start/stop).
     - Managing podcasts (series, episodes, publishing).
     - Managing interviews (schedule, invites, scoring, notes).
   - Form requests / validation classes.
   - Middleware specific to:
     - Access control (hosts vs attendees).
     - Paid access / ticket checks.
     - Role-based access inside events.

5. **Policies**
   - Authorization policies for:
     - Creating and managing webinars/networking sessions/podcasts/interviews.
     - Editing events only by hosts or admins.
     - Accessing interview scoring/criteria only by interviewers.

6. **Resources**
   - Blade templates for:
     - Webinars (detail pages, lobby/waiting room, catalogue pages).
     - Networking sessions (lobby, session page, “in-call” views).
     - Podcast pages (series, episode pages, catalogue).
     - Interview management (schedules, scoring, and overview screens).
   - Language files.
   - Any asset stubs that need to be published from the package.

7. **Admin Panel Entries**
   - Admin menus and configuration for:
     - Webinars catalogue / moderation.
     - Networking sessions overview and logs.
     - Podcast series and episodes management.
     - Interview templates, criteria matrices, and scoring schemes.
   - Any admin controllers, views, and routes required to manage these from the admin panel.

8. **Frontend Views**
   - User-facing views for:
     - Browsing webinars, networking sessions, and podcasts.
     - Registering/attending webinars and networking sessions.
     - Accessing webinar recordings catalogue.
     - Listening to podcasts and browsing series.
     - Viewing/interacting with interview invitations and schedules.

9. **Assets**
   - Any **non-binary** assets required (CSS, SCSS, SVG where applicable).
   - Frontend resources that support video/room styling, waiting rooms, and catalogue UI.

10. **Language Translations**
    - Language files used by the module (e.g. `resources/lang/en/webinar_networking_podcast.php`).
    - Ensure all user-facing text strings are covered.

11. **JavaScript**
    - Any JS needed for interactive features such as:
      - Live webinar UI, waiting rooms, countdowns.
      - Networking timers and rotation.
      - Dynamic podcast player features (seek, playlists).
      - Interview scoring forms.
    - Extract and adapt JS from `connect` and `wavepods` where relevant.

12. **Routes**
    - Web routes for:
      - Webinars, networking sessions, podcasts, interviews (frontend).
      - Host/creator management screens.
    - API routes for:
      - Listing and details of webinars/networking/podcasts/interviews.
      - Registration/attendance.
      - Interview scoring and matrix operations.
    - These API routes will be consumed by the Flutter addon.

13. **Services**
    - Service classes for:
      - Scheduling and calendar integration.
      - Paywall/access right checks.
      - Networking rotation logic (matching participants, timing).
      - Recording/archives management (webinar recordings and podcast audio).
      - Notification hooks (e.g. email/push before event start).
      - Interview scoring calculations and summaries.

14. **Support**
    - Helper functions.
    - Enums, DTOs, traits, and other support classes used by this functionality, e.g.:
      - `WebinarStatus`, `NetworkingSessionStatus`, `InterviewType`, `ScoringOutcome`.

15. **Service Provider**
    - `WebinarNetworkingInterviewPodcastServiceProvider.php`:
      - Registers routes, migrations, views, translations, configs.
      - Binds interfaces and services into the container where required.
      - Handles publishing of config, views, assets, and language files.

16. **Documentation**
    - `README.md`:
      - Installation steps (Composer + service provider).
      - Configuration instructions (integrations, paywalls, permissions).
      - Summary of features:
        - Webinars (live, scheduled, recorded catalogue).
        - Networking (speed networking sessions).
        - Podcasts (series, episodes, recording).
        - Interviews (scheduling, scoring matrix).
      - Notes about required environment or dependencies (e.g. streaming services, queue workers).

> 🎯 Focus: The Laravel package must deliver **full webinar, networking, interview, and podcast functionality** when installed into the host social platform.

---

## Part 2 – Flutter Webinar, Networking, Interview & Podcast Addon (`webinar_networking_interview_podcast_flutter_addon`)

We must:

1. Analyse the existing `connect` / `wavepods` (or other) mobile/web clients for these features.  
2. Replicate the same functionality in **Flutter**, as a modular **addon package**.  
3. Ensure the Flutter addon connects to the **Laravel webinar/networking/interview/podcast package API**.

The Flutter addon must include:

1. **`pubspec.yaml`**
   - Define this as a Flutter/Dart package.
   - List dependencies (HTTP client, JSON serialization, state management, video/audio players, RTC if needed, etc.).
   - Set the package name appropriately (e.g. `webinar_networking_podcast`).

2. **Models**
   - Dart models mirroring the Laravel API responses:
     - Webinar
     - Webinar registration/attendance
     - Webinar recording
     - Networking session
     - Networking participant and pairing/rotation info
     - Podcast series
     - Podcast episode
     - Interview
     - Interview scoring matrix, criteria, and questions
     - Tickets/access passes (for paywalled events).

3. **Pages**
   - Flutter UI screens equivalent to the source apps, for example:
     - Webinars:
       - Webinars list & filters
       - Webinar details
       - Registration page
       - Live webinar lobby / waiting room
       - Webinar live view (hooked to chosen video/RTC solution)
       - Recorded webinars catalogue and detail player
     - Networking:
       - Networking sessions list & details
       - Networking waiting room
       - In-session screen for speed networking (timer, rotation display, business card sharing)
     - Podcasts:
       - Podcast catalogue (series list)
       - Series detail and episode list
       - Episode player page
     - Interviews:
       - Interview invitations & details
       - Upcoming and past interviews
       - Interview scoring and notes (interviewers only).

4. **Services**
   - API service client(s) to communicate with the Laravel package:
     - Handle authentication (token, headers).
     - Methods such as:
       - `fetchWebinars()`, `fetchWebinarDetails(id)`, `registerForWebinar(id)`.
       - `fetchNetworkingSessions()`, `joinNetworkingSession(id)`.
       - `fetchPodcasts()`, `fetchPodcastSeries(id)`, `fetchEpisodes(seriesId)`.
       - `fetchInterviews()`, `submitInterviewScores(...)`.
     - All endpoints must match the Laravel routes provided by `webinar_networking_interview_podcast_laravel_package`.

5. **State**
   - State management (BLoC, Cubit, Provider, Riverpod, etc.) for:
     - Webinars (list, details, attendance status, live state).
     - Networking sessions (lobby, in-session rotation, timers).
     - Podcasts (catalogue, current playing episode, playback state).
     - Interviews (list, details, scoring forms).
   - Reflect the same behaviour and flows as the source implementations.

6. **`menu.dart`**
   - Expose navigation/menu entries for the host app, for example:
     - “Webinars”
     - “Networking”
     - “Podcasts”
     - “Interviews”
   - Provide a simple API (e.g. a list of `MenuItem` objects) so the main app can plug these pages into its global navigation.

7. **API Connection**
   - All network calls must connect to the **corresponding Laravel webinar/networking/interview/podcast package API**.
   - Ensure:
     - Consistent request/response models.
     - Proper error handling (network errors, validation errors).
     - Auth failures handled by redirecting to login/refreshing tokens.
     - Reasonable offline handling (retry, simple caching if implemented).

> 🎯 Focus: The Flutter addon must **mirror the webinar, networking, interview and podcast functionality** of the source apps, implemented cleanly as a reusable Flutter package, wired to the new Laravel package.

---

## Required Functional Areas (Both Laravel & Flutter)

Both the **Laravel package** and the **Flutter addon** must support the following core functions:

### Webinars

- Scheduled webinars.
- Free webinars.
- Paywalled webinars (tickets/subscriptions).
- Webinar creation and management (host tools).
- Webinar recorded catalogue (on-demand replays).
- Webinar event pages.
- Waiting room / lobby.
- Styling/customisation of webinar pages.
- Webinar drawing/whiteboard (if supported in source).
- Screen sharing (via integrated solution).

### Networking

- Speed networking (2-minute and 5-minute rotations).
- Free networking sessions.
- Paywalled networking sessions.
- Networking session creation and management.
- Networking schedule and events list.
- Networking session page/in-session UI.
- Waiting room / lobby for networking sessions.
- Business card / profile sharing between participants.
- Styling/customisation of networking pages.

### Podcasts

- Podcast player.
- Podcasts catalogue.
- Scheduled podcast releases.
- Podcast series and episodes.
- Podcast page and showcases.
- Single-person and multi-person podcasts.
- Podcast recording and storage (where supported).
- Waiting room / lobby (for live podcast recordings, if present).
- Podcast creation and management.
- Series creation and management.
- Styling/customisation of podcast pages.

### Interviews

- Interview schedule (calendar of interviews).
- Multi-person interviews (multiple interviewers/interviewees).
- File sharing during/interview context (CVs, portfolios).
- Interview waiting room.
- Interviewer criteria matrix, scoring and questions list (hidden from interviewee).
- Interview calendar integration and overview.

---

By following this document, the agent should:

- Extract all necessary logic from `connect` and `wavepods` (backend and any mobile/client code).  
- Rebuild them as:
  - A **modular Laravel webinar/networking/interview/podcast package**, and
  - A **modular Flutter webinar/networking/interview/podcast addon**,
- Ensuring **feature parity** across web and mobile and seamless integration into the host social/LinkedIn-style platform.
