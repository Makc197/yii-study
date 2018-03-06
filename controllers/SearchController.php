<?php

namespace app\controllers;

use Elasticsearch\ClientBuilder;
use yii\data\ArrayDataProvider;
//use app\config\ElasticSearchConfig;
use app\models\BookElasticSearch;
use app\models\CdElasticSearch;
use app\models\ProductElasticSearch;
use app\models\ElasticSearch;
use yii\elasticsearch\ActiveDataProvider;
use yii\elasticsearch\Query;
use yii\elasticsearch\ActiveQuery;
use app\models\Book;

class SearchController extends _BaseController
{

    public $client;

    const PART_SIZE = 5;

//    public function __construct($id, $module, $config=[]) {
//        parent::__construct($id, $module, $config);
//        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
//    }

    public function init()
    {
        parent::init();
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
    }

    public function Searches($value)
    {
        $searchs = $value['search'];
        $query = new Query();
        $db = Elastic::getDb();
        $queryBuilder = new QueryBuilder($db);
        $match = ['match' => ['article_content' => $searchs]];
        $query->query = $match;
        $build = $queryBuilder->build($query);
        $result = $query->search($db, $build);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);
        return $dataProvider;
    }

    public function actionEsSearch($q, $t = 'all')
    {

        $params = [
            'match' => [
                '_all' => $q //Ищем по всем полям массива значение $q 
            ]
        ];

        switch ($t) {
            case 'book':
                $query = BookElasticSearch::find()->query($params);
//                $model = BookElasticSearch::find()->query($params)->all();
                $query->from(BookElasticSearch::index(), BookElasticSearch::type());
                //execute the query
                $command = $query->createCommand();
                $result = $command->search();
                break;

            case 'cd':
                $query = CdElasticSearch::find()->query($params);
//                $model = CdElasticSearch::find()->query($params)->all();
                $query->from(CdElasticSearch::index(), CdElasticSearch::type());
                //execute the query
                $command = $query->createCommand();
                $result = $command->search();
                break;

            case 'product':
                $query = ProductElasticSearch::find()->query($params);
//                $model = ProductElasticSearch::find()->query($params)->all();
                $query->from(ProductElasticSearch::index(), ProductElasticSearch::type());
                //execute the query
                $command = $query->createCommand();
                $result = $command->search();
                break;

            case 'all':

            default:
                $query = ElasticSearch::find()->query($params);
//                $model = ElasticSearch::find()->query($params)->all();
                $query->from('_all');
                //execute the query
                $command = $query->createCommand();
                $result = $command->search();

//                $query = new Query();
//                $query = $query->query($params)->from('_all');
//                $command = $query->createCommand();
//                $result = $command->search();

            /*echo "<pre>";
            var_dump($result);
            die;*/
        }

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

    public function actionOldSearch($q)
    {

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
