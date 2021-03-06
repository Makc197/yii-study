<?php

use yii\db\Migration;

class m180216_144631_blameable extends Migration {

    public function safeUp() {
        $this->addColumn('book', 'created_by', $this->integer());
        $this->addColumn('book', 'updated_by', $this->integer());
        $this->addColumn('cd', 'created_by', $this->integer());
        $this->addColumn('cd', 'updated_by', $this->integer());
        $this->addColumn('product', 'created_by', $this->integer());
        $this->addColumn('product', 'updated_by', $this->integer());
    }

    public function safeDown() {
        echo "m180216_144631_blameable cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m180216_144631_blameable cannot be reverted.\n";

      return false;
      }
     */
}
