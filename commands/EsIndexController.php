<?php

namespace app\commands;

use yii\console\Controller;
use app\models\ElasticSearch;
use app\models\Cds;
use app\models\CdsElasticSearch;
use app\models\Books;
use app\models\BooksElasticSearch;
use app\models\Products;
use app\models\ProductsElasticSearch;

class EsIndexController Extends Controller {

    const PART_SIZE = 5;

    public function actionUpdateBooks() {

        $esbook = new BooksElasticSearch();
        $esbook::deleteIndex();
        echo 'deleteIndex complete' . "\n";
//        die;

        $esbook::createIndex();
        echo 'createIndex complete' . "\n";
//        die;

        $num_rows = Books::find()->count();

        echo "Count of books for index: " . $num_rows . "\n";
//        die;

        $num_parts = $num_rows / self::PART_SIZE;

        echo $num_parts . '\n';

        for ($i = 0; $i < $num_parts; $i++) {

            $books = Books::find()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($books as $book) {
                ++$n;
                echo "\n" . $n . "\n";

                $esbook = new BooksElasticSearch();
//              $esbook->load([(new \ReflectionClass($esbook))->getShortName() => $book->attributes]);
//              $esbook->load([$esbook->formName() => $book->attributes]);
//              $esbook->attributes = $book->attributes;
                $esbook->setAttributes($book->attributes, false);
                

                var_dump($esbook->author);
                $esbook->save(false);
            }
        }
    }

    public function actionUpdateCds() {
        $n = 0;
//      $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();

        $escd = new CdsElasticSearch();
        $escd::deleteIndex();
        echo 'deleteIndex complete' . "\n";
        die;

        $escd::createIndex();
        echo 'createIndex complete' . "\n";
//        die;

        $num_rows = Cds::find()->count();

        echo "Count of books for index: " . $num_rows . "\n";
//        die;

        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $cds = Cds::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($cds as $cd) {
                ++$n;
                echo "\n" . $n . "\n";
            }
        }
    }

    public function actionUpdateProducts() {
        $n = 0;
//        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();

        $esproduct = new ProductsElasticSearch();
        $esproduct::deleteIndex();
        echo 'deleteIndex complete' . "\n";
        die;

        $esproduct::createIndex();
        echo 'createIndex complete' . "\n";
//        die;

        $num_rows = Products::find()->count();

        echo "Count of books for index: " . $num_rows . "\n";
//        die;

        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $products = Products::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($products as $value) {
                ++$n;
                echo "\n" . $n . "\n";
            }
        }
    }

}
