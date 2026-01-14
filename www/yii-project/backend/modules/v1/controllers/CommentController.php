<?php

namespace backend\modules\v1\controllers;

use backend\modules\v1\controllers\ActiveController;
use backend\resource\Comment;
use yii\data\ActiveDataProvider;

/**
 * Контроллер для управления комментариями в REST API.
 * Обрабатывает CRUD операции для модели Comment.
 * Переопределяет действие index для фильтрации комментариев по post_id.
 */
class CommentController extends ActiveController
{
    /**
     * Класс модели, с которой работает контроллер.
     */
    public $modelClass = Comment::class;

    /**
     * Переопределяет действия контроллера.
     * Настраивает prepareDataProvider для index.
     *
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    /**
     * Подготавливает провайдер данных для index.
     * Фильтрует комментарии по post_id, переданному в GET параметре.
     *
     * @return ActiveDataProvider
     */
    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => Comment::find()->andWhere(['post_id' => \Yii::$app->request->get('post_id')]),
        ]);
    }
}