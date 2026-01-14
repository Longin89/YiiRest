<?php

use yii\db\Migration;
use Faker\Factory;

class m260113_134702_posts_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 25; $i++) {
            $this->insert('post', [
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'created_at' => time(),
                'updated_at' => null,
                'created_by' => 1,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->delete('post', ['created_by' => 1]);
    }

}
