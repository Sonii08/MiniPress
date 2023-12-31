// classe définissant les articles
import 'package:mobile/models/categorie.dart';
import 'package:mobile/models/utilisateur.dart';

class Article {
  final int id;
  final String titre;
  final String resume;
  final String contenu;
  final DateTime dateCreation;
  final String image;
  final int auteurId;
  Categorie? categorie;
  Utilisateur? auteur;

  // constructeur qui initialise tout sauf l'auteur, l'image et la catégorie
  Article({
    required this.id,
    required this.titre,
    required this.resume,
    required this.contenu,
    required this.dateCreation,
    required this.image,
    required this.auteurId,
    this.auteur,
    this.categorie
  });

  // change l'auteur
  void setAuteur(Utilisateur nom){
    auteur = nom;
  }

  // change la catégorie
  void setCategorie(Categorie nomCategorie){
    categorie = nomCategorie;
  }

  // crée un article depuis un objet json
  factory Article.fromJson(Map<String, dynamic> json){
    return Article(
      id: json['id'],
      titre: json['titre'],
      resume: json['resume'],
      contenu: json['contenu'],
      dateCreation: DateTime.parse(json['date_creation']),
      image: json['image'],
      auteurId: json['auteur']
    );
  }
}