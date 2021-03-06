<?php

namespace app\commands;

use yii\console\Controller;
use app\models\ElasticSearch;
use app\models\Cd;
use app\models\CdElasticSearch;
use app\models\Book;
use app\models\BookElasticSearch;
use app\models\Product;
use app\models\ProductElasticSearch;

class EsIndexController Extends Controller
{

    const PART_SIZE = 5;

    public function actionDeleteAllIndexes()
    {
        $elasticdb = new ElasticSearch();
        $elasticdb::deleteAllIndexes();
    }

    public function actionUpdateBooks()
    {

        $esbook = new BookElasticSearch();

        $esbook::deleteIndex();
        echo 'BookElasticSearch deleteIndex complete' . "\n";

        $esbook::createIndex();
        echo 'BookElasticSearch createIndex complete' . "\n";

        $num_rows = Book::find()->count();
        echo "Count of books for index: " . $num_rows . "\n";

        $num_parts = $num_rows / self::PART_SIZE;
        echo $num_parts . "\n";

        $n = 0;

        for ($i = 0; $i < $num_parts; $i++) {

            $books = Book::find()
                ->limit(self::PART_SIZE)
                ->offset($i * self::PART_SIZE)
                ->all();
            echo "\n" . "\n" . ($i + 1) . '/' . $num_parts . ' :' . "\n";

            foreach ($books as $book) {
                ++$n;
                echo "\n" . $n;
                $esbook = new BookElasticSearch();
//              $esbook->load([(new \ReflectionClass($esbook))->getShortName() => $book->attributes]);
//              $esbook->load([$esbook->formName() => $book->attributes]);
//              $esbook->attributes = $book->attributes;
                $esbook->setAttributes($book->attributes, false);
                $esbook->save(false);
            }
        }
    }

    public function actionUpdateCds()
    {
//      $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();

        $escd = new CdElasticSearch();

        $escd::deleteIndex();
        echo 'CdElasticSearch deleteIndex complete' . "\n";

        $escd::createIndex();
        echo 'CdElasticSearch createIndex complete' . "\n";

        $num_rows = Cd::find()->count();
        echo "Count of cds for index: " . $num_rows . "\n";

        $num_parts = $num_rows / self::PART_SIZE;
        echo $num_parts . "\n";

        $n = 0;

        for ($i = 0; $i < $num_parts; $i++) {
            $cds = Cd::find()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();
            echo "\n" . "\n" . ($i + 1) . '/' . $num_parts . ' :' . "\n";

            foreach ($cds as $cd) {
                ++$n;
                echo "\n" . $n;
                $escd = new CdElasticSearch();
                $escd->setAttributes($cd->attributes, false);
                $escd->save(false);
            }
        }
    }

    public function actionUpdateProducts()
    {
//      $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();

        $esproduct = new ProductElasticSearch();

        $esproduct::deleteIndex();
        echo 'ProductElasticSearch deleteIndex complete' . "\n";

        $esproduct::createIndex();
        echo 'ProductElasticSearch createIndex complete' . "\n";

        $num_rows = Product::find()->count();
        echo "Count of products for index: " . $num_rows . "\n";

        $num_parts = $num_rows / self::PART_SIZE;
        echo $num_parts . "\n";

        $n = 0;
        for ($i = 0; $i < $num_parts; $i++) {
            $products = Product::find()
                ->limit(self::PART_SIZE)
                ->offset($i * self::PART_SIZE)
                ->all();

            echo "\n" . "\n" . ($i + 1) . '/' . $num_parts . ' :' . "\n";

            foreach ($products as $product) {
                ++$n;
                echo "\n" . $n;
                $esproduct = new ProductElasticSearch();
                $esproduct->setAttributes($product->attributes, false);
                $esproduct->save(false);
            }
        }
    }

}
