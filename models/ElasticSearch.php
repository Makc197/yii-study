<?php

namespace app\models;

use yii\web\Controller;
use yii\elasticsearch\ActiveRecord;
use yii\data\ArrayDataProvider;

class ElasticSearch extends ActiveRecord {

    public function attributes() {
        return ['id', 'user_id', 'type', 'title', 'description', 'price', 'author', 'numpages'];
    }

    public static function index() {
        return 'esdb';
    }

    public static function type() {
        return;
    }

}
