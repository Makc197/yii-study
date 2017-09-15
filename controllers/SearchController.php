<?php

namespace app\controllers;

use Elasticsearch\ClientBuilder;
use yii\data\ArrayDataProvider;
//use app\config\ElasticSearchConfig;
use app\models\BooksElasticSearch;
use app\models\CdsElasticSearch;
use app\models\ProductsElasticSearch;
use app\models\ElasticSearch;
use yii\elasticsearch\ActiveDataProvider;

class SearchController extends _BaseController {

    public $client;

//    public function __construct($id, $module, $config=[]) {
//        parent::__construct($id, $module, $config);
//        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
//    }

    public function init() {
        parent::init();
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
    }

    public function actionEssearch($q, $t) {

        $params = [
            'match' => [
                '_all' => $q
            ]
        ];

        switch ($t) {
            case 'books':
                $query = BooksElasticSearch::find()->query($params);
                $model = BooksElasticSearch::find()->query($params)->all();
                break;

            case 'cds':
                $query = CdsElasticSearch::find()->query($params);
                $model = CdsElasticSearch::find()->query($params)->all();
                break;

            case 'products':
                $query = ProductsElasticSearch::find()->query($params);
                $model = ProductsElasticSearch::find()->query($params)->all();
                break;

            case 'all':
            default:
                $query = ElasticSearch::find()->query($params);
                $model = ElasticSearch::find()->query($params)->all();
        }

//        echo "<pre>";
//        var_dump($model);
//        die;
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);

//        $dataProvider = new ArrayDataProvider([
//            'allModels' => $model,
//            'pagination' => [
//                'pageSize' => 20,
//            ],
//        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionOldSearch($q) {

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
//        echo "<pre>";
//        var_dump($response);
//        die;
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
