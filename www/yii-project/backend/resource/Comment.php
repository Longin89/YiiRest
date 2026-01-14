<?php

namespace backend\resource;

/**
 * Ресурс-модель для комментариев в REST API.
 * Расширяет базовую модель Comment из common\models.
 * Определяет поля, возвращаемые в API ответах.
 */
class Comment extends \common\models\Comment
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
     * Например, ?expand=post вернет комментарий с данными поста.
     *
     * @return array Список имен дополнительных полей (отношений)
     */
    public function extraFields()
    {
        return ['post'];
    }

    /**
     * Получает запрос для связанного поста.
     * Определяет отношение "многие к одному" между комментарием и постом.
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostQuery Запрос для поста
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}
