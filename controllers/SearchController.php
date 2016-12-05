<?php

namespace app\controllers;

use yii\web\Controller;
use Elasticsearch\ClientBuilder;
use yii\data\ArrayDataProvider;

class SearchController extends Controller {

    public $client;

    public function actionSearch($q) {
        //die($q);
        $this->client = ClientBuilder::create()->build();

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
