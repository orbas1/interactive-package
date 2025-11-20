import 'package:flutter/material.dart';

import '../api/wnip_api_client.dart';
import 'interviews/interview_list_page.dart';
import 'networking/networking_list_page.dart';
import 'podcasts/podcast_list_page.dart';
import 'webinars/webinar_list_page.dart';

class AddonMenuItem {
  final String title;
  final IconData icon;
  final WidgetBuilder builder;

  const AddonMenuItem({required this.title, required this.icon, required this.builder});
}

List<AddonMenuItem> buildAddonMenu(WnipApiClient apiClient) {
  return [
    AddonMenuItem(
      title: 'Webinars',
      icon: Icons.live_tv,
      builder: (_) => WebinarListPage(apiClient: apiClient),
    ),
    AddonMenuItem(
      title: 'Networking',
      icon: Icons.people_outline,
      builder: (_) => NetworkingListPage(apiClient: apiClient),
    ),
    AddonMenuItem(
      title: 'Podcasts',
      icon: Icons.podcasts,
      builder: (_) => PodcastListPage(apiClient: apiClient),
    ),
    AddonMenuItem(
      title: 'Interviews',
      icon: Icons.calendar_month,
      builder: (_) => InterviewListPage(apiClient: apiClient),
    ),
  ];
}
