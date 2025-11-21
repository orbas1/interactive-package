import 'dart:async';

import 'package:flutter/material.dart';

class WebinarWaitingRoomScreen extends StatefulWidget {
  const WebinarWaitingRoomScreen({super.key, required this.webinarTitle});

  final String webinarTitle;

  @override
  State<WebinarWaitingRoomScreen> createState() => _WebinarWaitingRoomScreenState();
}

class _WebinarWaitingRoomScreenState extends State<WebinarWaitingRoomScreen> {
  late Timer _timer;
  Duration remaining = const Duration(minutes: 5);
  bool live = false;

  @override
  void initState() {
    super.initState();
    _timer = Timer.periodic(const Duration(seconds: 1), (_) {
      setState(() {
        remaining = remaining - const Duration(seconds: 1);
        if (remaining.inSeconds <= 0) live = true;
      });
    });
  }

  @override
  void dispose() {
    _timer.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    final time = remaining.inSeconds < 0 ? '00:00' : '${remaining.inMinutes.remainder(60).toString().padLeft(2, '0')}:${(remaining.inSeconds % 60).toString().padLeft(2, '0')}';
    return Scaffold(
      appBar: AppBar(title: const Text('Waiting Room')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(widget.webinarTitle, style: Theme.of(context).textTheme.headlineSmall),
            const SizedBox(height: 12),
            Card(
              child: Padding(
                padding: const EdgeInsets.all(16),
                child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
                  const Text('Countdown'),
                  Text(time, style: Theme.of(context).textTheme.displaySmall),
                  const SizedBox(height: 12),
                  const Text('Announcements'),
                  const Text('Host will update here before going live.'),
                ]),
              ),
            ),
            const SizedBox(height: 16),
            ElevatedButton(
              onPressed: live ? () => Navigator.pushNamed(context, '/live/webinars/live') : null,
              child: Text(live ? 'Enter Webinar' : 'Waiting for host'),
            ),
          ],
        ),
      ),
    );
  }
}
