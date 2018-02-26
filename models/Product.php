<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property double $price
 */
class Product extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    public function behaviors() {
        return [
            //BlameableBehavior::className()
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
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
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'price' => 'Цена',
        ];
    }

}
