import 'dart:async';

import 'package:flutter/material.dart';

class NetworkingWaitingRoomScreen extends StatefulWidget {
  const NetworkingWaitingRoomScreen({super.key, required this.sessionTitle});

  final String sessionTitle;

  @override
  State<NetworkingWaitingRoomScreen> createState() => _NetworkingWaitingRoomScreenState();
}

class _NetworkingWaitingRoomScreenState extends State<NetworkingWaitingRoomScreen> {
  Duration remaining = const Duration(minutes: 3);
  late Timer _timer;

  @override
  void initState() {
    super.initState();
    _timer = Timer.periodic(const Duration(seconds: 1), (_) {
      setState(() {
        remaining -= const Duration(seconds: 1);
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
    final countdown = '${remaining.inMinutes.remainder(60).toString().padLeft(2, '0')}:${(remaining.inSeconds % 60).toString().padLeft(2, '0')}';
    return Scaffold(
      appBar: AppBar(title: const Text('Waiting Room')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(widget.sessionTitle, style: Theme.of(context).textTheme.headlineSmall),
            const SizedBox(height: 12),
            Card(
              child: Padding(
                padding: const EdgeInsets.all(12),
                child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
                  const Text('Countdown'),
                  Text(countdown, style: Theme.of(context).textTheme.displaySmall),
                  const SizedBox(height: 12),
                  const Text('Edit card'),
                  TextField(decoration: const InputDecoration(labelText: 'Headline')),
                  TextField(decoration: const InputDecoration(labelText: 'Bio')),
                ]),
              ),
            ),
            const SizedBox(height: 16),
            ElevatedButton(
              onPressed: remaining.isNegative ? () => Navigator.pushNamed(context, '/live/networking/live') : null,
              child: const Text('Join Session'),
            )
          ],
        ),
      ),
    );
  }
}
