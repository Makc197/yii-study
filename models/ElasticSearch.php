<?php

namespace app\models;

use yii\elasticsearch\ActiveRecord;

class ElasticSearch extends ActiveRecord
{

    public function rules()
    {
        return [
            [['id', 'type', 'title', 'description', 'price'], 'safe']
        ];
    }

    public function attributes()
    {
        return ['id', 'type', 'title', 'description', 'price'];
    }

    public static function index()
    {
        return '_all';
    }

    public static function type()
    {
        return null;
    }

    public static function deleteAllIndexes()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteAllIndexes();
    }

}
