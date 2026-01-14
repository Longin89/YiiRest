<?php

namespace backend\modules\v1\controllers;

use backend\modules\v1\controllers\ActiveController;
use backend\resource\Post;

/**
 * Контроллер для управления постами в REST API.
 * Обрабатывает CRUD операции для модели Post.
 * Наследуется от ActiveController, который предоставляет базовую функциональность REST.
 */
class PostController extends ActiveController
{
    /**
     * Класс модели, с которой работает контроллер.
     * Используется для автоматической генерации действий REST (index, view, create, update, delete).
     */
    public $modelClass = Post::class;

}
