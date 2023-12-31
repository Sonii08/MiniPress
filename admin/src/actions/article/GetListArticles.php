<?php

namespace minipress\admin\actions\article;

use minipress\admin\actions\AbstractAction;
use minipress\admin\services\article\ArticleService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

// affiche le form d'un article
class GetListArticles extends AbstractAction {

    // méthode magique invoquée pour gérer l'action
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {

        //On récupère toute la liste des articles par date de création inverse
        $articles = ArticleService::getArticleSortDateCrea();

        //Renvoie la page listArticles.twig
        $view = Twig::fromRequest($request);
        return $view->render($response, '/article/listArticles.twig',['articles'=>$articles]);
    }
}