<?php

namespace backend\modules\v1\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * @param string $action
 * @param object|null $model
 * @param array $params 
 * @throws \yii\web\ForbiddenHttpException
 */

/**
 * Базовый контроллер для REST API модуля v1.
 * Расширяет стандартный ActiveController, добавляя аутентификацию через Bearer токены
 * и проверку доступа для операций создания, обновления и удаления.
 */
class ActiveController extends \yii\rest\ActiveController
{
    /**
     * Настраивает поведения контроллера.
     * Добавляет аутентификацию через HttpBearerAuth только для действий create, update, delete.
     *
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    /**
     * Проверяет доступ пользователя к модели для указанного действия.
     * Для действий update и delete проверяет, что юзер является владельцем поста.
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) { {
                throw new ForbiddenHttpException('Вы не можете редактировать чужие записи.');
            }
        }
    }
}
