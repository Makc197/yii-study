<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Cds;
use app\models\Books;
use app\models\Products;
use Elasticsearch\ClientBuilder;
use app\config\ElasticSearchConfig;

class EsIndexController Extends Controller {


    public $client;
    
    const PART_SIZE = 5;
			
    public function actionUpdateBooks() {
        $n = 0;
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        //$books = Books::find()->asArray()->all();
        $num_rows = Books::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $books = Books::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();


            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($books as $value) {
                ++$n;
                echo "\n" . $n . "\n";
                $params = [
                    'index' => 'esdb',
                    'type' => 'books',
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
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        $num_rows = Cds::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $cds = Cds::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($cds as $value) {
                ++$n;
                echo "\n" . $n . "\n";
                $params = [
                    'index' => 'esdb',
                    'type' => 'cds',
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
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
        $num_rows = Products::find()->count();
        $num_parts = $num_rows / self::PART_SIZE;

        for ($i = 0; $i < $num_parts; $i++) {
            $products = Products::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

            echo ($i + 1) . '/' . $num_parts . " ======================================";

            foreach ($products as $value) {
                ++$n;
                echo "\n" . $n . "\n";
                $params = [
                    'index' => 'esdb',
                    'type' => 'products',
                    'id' => $value['id'],
                    'body' => $value
                ];

                $response = $this->client->index($params);
                var_dump($response);
            }
        }
    }

}
