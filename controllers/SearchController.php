<?php

namespace app\controllers;

use Elasticsearch\ClientBuilder;
use yii\data\ArrayDataProvider;
use app\config\ElasticSearchConfig;
use app\models\BooksElasticSearch;
use app\models\CdsElasticSearch;
use app\models\ProductsElasticSearch;
use app\models\ElasticSearch;

class SearchController extends _BaseController {

    public $client;

    public function actionEssearch($q, $t) {

        //var_dump($q);var_dump($t); die;
        $params = [
            'match' => [
                '_all' => $q
            ]
        ];

        switch ($t) {
            case 'books':
                $model = BooksElasticSearch::find()->query($params)->all();
                var_dump($model);
                break;

            case 'cds':
                $model = CdsElasticSearch::find()->query($params)->all();
                var_dump($model);
                break;

            case 'products':
                $model = ProductsElasticSearch::find()->query($params)->all();
                var_dump($model);
                break;

            case 'all':
            default:
                $model = ElasticSearch::find()->query($params)->all();
                var_dump($model);
        }
    }

    public function actionTest() {
        // $username=Yii::$app->user->Identity;
        // var_dump($username);
        // $permit='view';
        // var_dump(Yii::$app->user->can($permit, ['model' => $model]));
        $q = '123';

        $params = [
            'match' => [
                '_all' => $q
            ]
        ];
        //$model = new ElasticSearch;
        $model = ElasticSearch::find()->query($params)->all();
        var_dump($model);
    }

    public function actionSearch($q) {
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();

        $params = [
            'index' => 'esdb',
            'body' => [
                'query' => [
                    'match' => [
                        '_all' => $q
                    ]
                ]
            ]
        ];

        $response = $this->client->search($params);
        //echo "<pre>";
        //var_dump($response); die;
        $result = $response['hits']['hits'];

        $dataProvider = new ArrayDataProvider([
            'allModels' => $result,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', [
                    'dataProvider' => $dataProvider,
        ]);
    }

}
