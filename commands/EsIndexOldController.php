<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Cd;
use app\models\Book;
use app\models\Product;
use Elasticsearch\ClientBuilder;

//use app\config\ElasticSearchConfig;

class EsIndexOldController Extends Controller {

    public $client;

    const PART_SIZE = 5;

    public function init() {
        parent::init();
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
    }

    public function actionUpdateBooks() {
        $n = 0;
//        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        //$book = Book::find()->asArray()->all();
        $num_rows = Book::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $books = Book::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($books as $value) {
                ++$n;
                echo "\n" . $n . "\n";
                $params = [
                    'index' => 'esdb',
                    'type' => 'book',
                    'id' => $value['id'],
                    'body' => $value
                ];

                $response = $this->client->index($params);
                var_dump($response);
            }
        }
    }

    public function actionUpdateCds() {
        $n = 0;
//      $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        $num_rows = Cd::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $cds = Cd::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($cds as $value) {
                ++$n;
                echo "\n" . $n . "\n";
                $params = [
                    'index' => 'esdb',
                    'type' => 'cd',
                    'id' => $value['id'],
                    'body' => $value
                ];

                $response = $this->client->index($params);
                var_dump($response);
            }
        }
    }

    public function actionUpdateProducts() {
        $n = 0;
//        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        $num_rows = Product::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $products = Product::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($products as $value) {
                ++$n;
                echo "\n" . $n . "\n";
                $params = [
                    'index' => 'esdb',
                    'type' => 'product',
                    'id' => $value['id'],
                    'body' => $value
                ];

                $response = $this->client->index($params);
                var_dump($response);
            }
        }
    }

}
