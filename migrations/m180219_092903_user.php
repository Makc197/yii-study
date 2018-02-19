<?php

use yii\db\Migration;

class m180219_092903_user extends Migration {

    public function safeUp() {
        $this->execute("CREATE TABLE user (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `created` datetime NOT NULL,
        `lastname` varchar(200),
        `firstname` varchar(200),
        `middlename` varchar(200),
        `login` varchar(200) NOT NULL,
        `passwhash` varchar(500) NOT NULL,
        `birthday` date,
        `email` varchar(200) NOT NULL,
        `emailtoken` varchar(200),
        `isactive` bool DEFAULT false NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `login` (`login`)
        ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8");
    }

    public function safeDown() {
        echo "m180219_092903_user cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m180219_092903_user cannot be reverted.\n";

      return false;
      }
     */
}
