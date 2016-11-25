<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property double $price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required'],
            [['price'], 'number'],
            [['type'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'price' => 'Цена',
        ];
    }
}
