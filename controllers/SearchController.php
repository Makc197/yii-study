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
use app\models\Book;

class SearchController extends _BaseController {

    public $client;

    const PART_SIZE = 5;

//    public function __construct($id, $module, $config=[]) {
//        parent::__construct($id, $module, $config);
//        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
//    }

    public function init() {
        parent::init();
        $this->client = ClientBuilder::create()->setHosts(\Yii::$app->params['es_hosts'])->build();
    }

    public function actionTest() {


        $books = Book::find()->asArray()->limit(self::PART_SIZE)->offset($i * self::PART_SIZE)->all();

        foreach ($books as $book) {
            ++$n;
            echo "\n" . $n . "\n";

            $esbook = new BookElasticSearch();

            $esbook->id = $book->id;
            $esbook->type = $book->type;
            $esbook->title = $book->title;
            $esbook->description = $book->description;
            $esbook->price = $book->price;
            $esbook->author = $book->author;
            $esbook->numpages = $book->numpages;

            $esbook->save();

            //$esbookfind = BookElasticSearch::find()->asArray()->all();
//            var_dump($esbookfind);
//            echo '\n';
//            die;
        }

        return $this->render('test');
    }

    public function Searches($value) {
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

    public function actionEssearch($q, $t) {

        $params = [
            'match' => [
                '_all' => $q //Ищем по всем полям массива значение $q 
            ]
        ];

        $query = new Query();
        $query->source('*'); // _source - fields for results

        switch ($t) {
            case 'book':
                $query = BookElasticSearch::find()->query($params);
                $model = BookElasticSearch::find()->query($params)->all();
                $query->from(BookElasticSearch::index(), BookElasticSearch::type());
                //execute the query
                $command = $query->createCommand();
                $result = $command->search();
                
//                echo "<pre>";
//                print_r($result);
//                die;
                break;

            case 'cd':
                $query = CdElasticSearch::find()->query($params);
                $model = CdElasticSearch::find()->query($params)->all();
                break;

            case 'product':
                $query = ProductElasticSearch::find()->query($params);
                $model = ProductElasticSearch::find()->query($params)->all();
                break;

            case 'all':
            default:
                $query = ElasticSearch::find()->query($params);
                $model = ElasticSearch::find()->query($params)->all();
        }

//        echo "<pre>";
//        var_dump($rows);
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
