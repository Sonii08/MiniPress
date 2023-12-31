import 'package:flutter/material.dart';
import 'package:flutter_markdown/flutter_markdown.dart';
import 'package:intl/intl.dart';
import 'package:mobile/screens/auteur/auteur_articles.dart';
import 'package:mobile/utils/app_utils.dart';

import '../../models/article.dart';
import '../../models/utilisateur.dart';

// widget d'affichage d'une article
class ArticleDetails extends StatelessWidget {
  // article à afficher
  final Article article;

  // construit le widget avec l'article entré en paramètres
  const ArticleDetails({super.key, required this.article});

  @override
  Widget build(BuildContext context) {
    return SingleChildScrollView(
      // Wrap the entire content in a SingleChildScrollView
      child: Center(
        child: Column(
          children: <Widget>[
            Padding(
              padding: const EdgeInsets.only(bottom: 20),
              child: Image.network(article.image),
            ),
            Padding(
              padding: const EdgeInsets.only(bottom: 20),
              child: Text(
                article.titre,
                textAlign: TextAlign.center,
                style: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
              ),
            ),
            Padding(
              padding: const EdgeInsets.only(bottom: 20),
              child: Text('Créé le ${DateFormat.yMd('fr_FR').format(article.dateCreation)}'),
            ),
            Padding(
              padding: const EdgeInsets.only(bottom: 20),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: <Widget>[
                  const Text(
                      'Écrit par ',
                    style: TextStyle(
                      fontSize: 20
                    )
                  ),
                  GestureDetector(
                    child: Text(
                      '${article.auteur?.nom} ${article.auteur?.prenom}',
                      style: const TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 20,
                          color: AppUtils.primaryBackground,
                          decoration: TextDecoration.underline,
                          decorationThickness: 2
                      ),
                    ),
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(builder: (BuildContext context) {
                          return Builder(
                            builder: (BuildContext context) {
                              // récupère l'auteur
                              final Utilisateur auteur = article.auteur!;
                              // crée le widget d'affichage
                              final AuteurArticles auteurArticles = AuteurArticles(auteur: auteur);
                              // Appelle la fonction pour obtenir la nouvelle page
                              return AppUtils.buildNewPage(
                                  context,
                                  "Articles de ${auteur.nom} ${auteur.prenom}",
                                  auteurArticles
                              );
                            },
                          );
                        }),
                      );
                    },
                  ),
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.only(bottom: 20),
              child: MarkdownBody(data: article.resume),
            ),
            Padding(
              padding: const EdgeInsets.only(bottom: 20),
              child: MarkdownBody(data: article.contenu),
            ),
          ],
        ),
      ),
    );
  }
}
