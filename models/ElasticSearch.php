<?php

namespace app\models;

use yii\elasticsearch\ActiveRecord;

class ElasticSearch extends ActiveRecord
{

    public function attributes()
    {
        return ['id', 'type', 'title', 'description', 'price'];
    }

    public static function index()
    {
        return 'esdb';
    }

    public static function type()
    {
        return;
    }

    public static function deleteIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteAllIndexes();
    }

}
