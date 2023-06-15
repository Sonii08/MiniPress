<?php

namespace minipress\api\services\article;

use minipress\api\models\Article;

// gère les actions sur les Articles
class ArticleService {

    //récupère tous les articles
    public static function getArticle(): array {
        return Article::all()->toArray();
    }

    //récupère un article avec son id
    public static function getArticleById(int $id): array {
        return Article::find($id)->toArray();
    }


}