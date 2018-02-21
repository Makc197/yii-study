<?php

use yii\db\Migration;

class m180216_144631_blameable extends Migration {

    public function safeUp() {
        $this->addColumn('books', 'created_by', $this->integer());
        $this->addColumn('books', 'updated_by', $this->integer());
        $this->addColumn('cds', 'created_by', $this->integer());
        $this->addColumn('cds', 'updated_by', $this->integer());
        $this->addColumn('products', 'created_by', $this->integer());
        $this->addColumn('products', 'updated_by', $this->integer());
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
