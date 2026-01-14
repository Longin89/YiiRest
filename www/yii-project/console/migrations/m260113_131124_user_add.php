<?php

use yii\db\Migration;

class m260113_131124_user_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'b2Joqmf2rXR8xirkOPLTPFcGeXS3Mv5J',
            'access_token' => 'uz8x6wtKM-ukoHEUnwVZovqQ6Gam0-89',
            'password_hash' => '$2y$13$f7KKqliQFm3wf9DCBmNqTOOIv409XjFm1QJ7Dlr2fkSq9OF9K8wHq', // password: admin123
            'password_reset_token' => null,
            'email' => 'test@mail.ru',
            'status' => 10, // active status
            'created_at' => time(),
            'updated_at' => null,
            'verification_token' => null,
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->delete('user', ['username' => 'admin']);
    }
}
