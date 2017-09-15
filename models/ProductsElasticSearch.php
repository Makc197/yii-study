<?php

namespace app\models;

use yii\elasticsearch\ActiveRecord;

class ProductsElasticSearch extends ActiveRecord {

    public function attributes() {
        return ['id', 'user_id', 'type', 'title', 'description', 'price', 'author'];
    }

    public static function index() {
        return 'esdb';
    }

    public static function type() {
        return 'products';
    }

}
