<?php

namespace app\models;

use yii\elasticsearch\ActiveRecord;

class ProductElasticSearch extends ActiveRecord
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
        return 'product_all';
    }

    public static function type()
    {
        return 'product';
    }

    /**
     * @return array This model's mapping
     */
    public static function mapping()
    {

        return [
            static::type() => [
                'properties' => [
                    'id' => ['type' => 'integer'],
                    'type' => ['type' => 'string'],
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'price' => ['type' => 'double'],
                ]
            ],
        ];

    }

    public static function setUpMapping()
    {
        $db = static::getDb();

        //in case you are not using elasticsearch ActiveRecord so current class extends database ActiveRecord yii/db/activeRecord
        //$db = yii\elasticsearch\ActiveRecord::getDb();

        $command = $db->createCommand();

        /*
         * you can delete the current mapping for fresh mapping but this not recommended and can be dangrous.
         */

        // $command->deleteMapping(static::index(), static::type());

        $command->setMapping(static::index(), static::type(), [
            static::type() => [
                'properties' => [
                    'id' => ['type' => 'integer'],
                    'type' => ['type' => 'string'],
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'price' => ['type' => 'double'],
                ]
            ],
        ]);
        //echo "<pre>";print_r($command);die;
    }

    /**
     * Set (update) mappings for this model
     */
    public static function updateMapping()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->setMapping(static::index(), static::type(), static::mapping());
    }

    /**
     * Create this model's index
     */
    public static function createIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->createIndex(static::index(), [
            //'settings' => [ /* ... */],
            'mappings' => static::mapping(),
            //'warmers' => [ /* ... */ ],
            //'aliases' => [ /* ... */ ],
            //'creation_date' => '...'
        ]);
    }


    /**
     * Delete this model's index
     */
    public static function deleteIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteIndex(static::index());
    }


}
