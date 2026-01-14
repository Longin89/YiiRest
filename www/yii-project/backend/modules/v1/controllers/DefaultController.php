<?php

namespace backend\modules\v1\controllers;

use yii\web\Controller;

/**
 * Контроллер по умолчанию для модуля v1.
 * Предоставляет базовую функциональность для модуля REST API.
 */
class DefaultController extends Controller
{
    /**
     * Отображает индексную страницу модуля.
     * Рендерит вид 'index' для модуля v1.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
