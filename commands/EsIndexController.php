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
        echo 'deleteIndex complete';
//        die;
        
        $esbook::createIndex();
        echo 'createIndex complete';
        die;
        
        $num_rows = Books::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $books = Books::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($books as $book) {
                ++$n;
                echo "\n" . $n . "\n";
                
                $esbook = new BooksElasticSearch();

                $esbook->id = $book->id;
                $esbook->type = $book->type;
                $esbook->title = $book->title;
                $esbook->description = $book->description;
//                $esbook->price = $book->price;
                $esbook->author = $book->author;
                $esbook->numpages = $book->numpages;

                $esbook->save();
            }
        }
    }

    public function actionUpdateCds() {
        $n = 0;
//      $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        $num_rows = Cds::find()->count();
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
        $num_rows = Products::find()->count();
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
