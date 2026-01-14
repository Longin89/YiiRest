<?php

use yii\db\Migration;
use Faker\Factory;

class m260113_140202_comments_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 80; $i++) {
            $this->insert('comment', [
                'post_id' => $faker->numberBetween(1, 25),
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
        echo "m260113_140202_comments_add cannot be reverted.\n";

        return false;
    }
}
