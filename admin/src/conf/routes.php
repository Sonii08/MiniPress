<?php

use minipress\admin\actions\article\GetFormCreateArticle;
use minipress\admin\actions\article\GetListArticles;
use minipress\admin\actions\article\GetListArticlesByAuteur;
use minipress\admin\actions\article\GetListArticlesByCat;
use minipress\admin\actions\article\PostFormCreateArticle;
use minipress\admin\actions\article\PostPublication;
use minipress\admin\actions\categorie\GetFormCreateCategorie;
use minipress\admin\actions\categorie\GetListCategories;
use minipress\admin\actions\categorie\PostFormCreateCategorie;
use minipress\admin\actions\GetHomePageAction;
use minipress\admin\actions\user\DeconnectUserSession;
use minipress\admin\actions\user\GetFormConnexionUser;
use minipress\admin\actions\user\GetFormCreateUser;
use minipress\admin\actions\user\GetUsers;
use minipress\admin\actions\user\PostFormConnexionUser;
use minipress\admin\actions\user\PostFormCreateUser;

return function (Slim\App $app): void {

    //Page par defaut
    $app->get('[/]', GetHomePageAction::class)->setName('homePage');

    //Formulaire de création d'un article
    $app->get('/articles/new[/]', GetFormCreateArticle::class)->setName('formArticle');

    //Creation d'un article
    $app->post('/articles/new[/]', PostFormCreateArticle::class)->setName('CreateArticle');

    //Formulaire de création d'une catégorie
    $app->get('/categories/new[/]', GetFormCreateCategorie::class)->setName('formCat');

    //Creation d'une catégorie
    $app->post('/categories/new[/]', PostFormCreateCategorie::class)->setName('CreateCat');

    //Liste des articles
    $app->get('/articles[/]', GetListArticles::class)->setName('listArticle');

    //Liste des catégories
    $app->get('/categories[/]', GetListCategories::class)->setName('listCat');

    //Liste des articles par catégorie
    $app->get('/categories/{id_cat}/articles[/]', GetListArticlesByCat::class)->setName('listArticleByCat');

    //Liste des articles par catégorie
    $app->get('/signIn[/]', GetFormConnexionUser::class)->setName('connexion');

    //Liste des articles par catégorie
    $app->post('/signIn[/]', PostFormConnexionUser::class)->setName('connexion');

    //Liste des articles par catégorie
    $app->get('/signUp[/]', GetFormCreateUser::class)->setName('inscription');

    //Liste des articles par catégorie
    $app->get('/signUp/error[/]', GetFormCreateUser::class)->setName('inscriptionError');

    //Liste des articles par catégorie
    $app->post('/signUp[/]', PostFormCreateUser::class)->setName('inscription');

    //Liste des utilisateurs
    $app->get('/users[/]', GetUsers::class)->setName('listUtilisateurs');

    //Deconnecte l'utilisateur
    $app->get('/deconnexion[/]', DeconnectUserSession::class)->setName('deconnexion');

    //Liste des articles de l'auteur
    $app->get('/articles/user/{id_user}', GetListArticlesByAuteur::class)->setName('listArticleAuteur');

    //Publie ou dépublie
    $app->post('/articles/user/{id_user}', PostPublication::class)->setName('publierAction');

};