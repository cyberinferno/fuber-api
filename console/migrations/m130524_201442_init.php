<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        for ($i = 0; $i < 4; $i++) {
            $this->insert('{{%user}}', [
                'username' => 'fubertest' . ($i + 1),
                'email' => 'test' . ($i + 1) . '@fuber.com',
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => Yii::$app->security->generatePasswordHash('fubertest' . ($i + 1)),
                'status' => 10,
                'created_at' => time(),
                'updated_at' => time()
            ]);
        }
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'driver_name' => $this->string(255)->notNull(),
            'registration_number' => $this->string(20)->unique()->notNull(),
            'current_location_x' => $this->integer()->notNull(),
            'current_location_y' => $this->integer()->notNull(),
            'type' => $this->smallInteger()->notNull()->defaultValue(10),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        for ($i = 0; $i < 4; $i++) {
            $this->insert('{{%car}}', [
                'driver_name' => 'Driver ' . ($i + 1),
                'registration_number' => 'KA 05 H ' . mt_rand(1001, 9999),
                'current_location_x' => mt_rand(10, 99),
                'current_location_y' => mt_rand(10, 99),
                'type' => (($i + 1) % 2 == 0) ? 20 : 10,
                'status' => 10,
                'created_at' => time(),
                'updated_at' => time()
            ]);
        }
        $this->createTable('{{%ride}}', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'start_location_x' => $this->integer()->notNull(),
            'start_location_y' => $this->integer()->notNull(),
            'end_location_x' => $this->integer()->notNull(),
            'end_location_y' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'ride_started_at' => $this->integer()->notNull(),
            'ride_ended_at' => $this->integer(),
            'price' => $this->float()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('fk_ride_car', '{{%ride}}', 'car_id', '{{%car}}', 'id');
        $this->addForeignKey('fk_ride_user', '{{%ride}}', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_ride_user', '{{%ride}}');
        $this->dropForeignKey('fk_ride_car', '{{%ride}}');
        $this->dropTable('{{%ride}}');
        $this->dropTable('{{%car}}');
        $this->dropTable('{{%user}}');
    }
}
