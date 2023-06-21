import 'package:flutter/material.dart';
import 'package:intl/date_symbol_data_local.dart';
import 'package:mobile/providers/articles_provider.dart';
import 'package:provider/provider.dart';

import 'minipress_home.dart';

void main() async {
  await initializeDateFormatting('fr_FR', null);
  runApp(
      ChangeNotifierProvider(
        create: (context) => ArticlesProvider(),
        child: const MiniPressApp()
      ),
  );
}