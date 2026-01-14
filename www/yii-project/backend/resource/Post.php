<?php

namespace backend\resource;

/**
 * Ресурс-модель для постов в REST API.
 * Расширяет базовую модель Post из common\models.
 * Определяет поля, возвращаемые в API ответах.
 */
class Post extends \common\models\Post
{
    /**
     * Определяет основные поля, возвращаемые в API.
     * Эти поля будут включены в JSON ответы по умолчанию.
     *
     * @return array Список имен полей
     */
    public function fields()
    {
        return ['id', 'title', 'body'];
    }

    /**
     * Определяет дополнительные поля, которые можно запросить через параметр expand.
     * Например, ?expand=comments вернет пост с комментариями.
     *
     * @return array Список имен дополнительных полей (отношений)
     */
    public function extraFields()
    {
        return ['comments', 'createdBy'];
    }

    /**
     * Получает запрос для связанных комментариев.
     * Определяет отношение "один ко многим" между постом и комментариями.
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CommentQuery Запрос для комментариев
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}