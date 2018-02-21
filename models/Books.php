<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property double $price
 * @property string $author
 * @property string $numpages
 */
class Books extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'books';
    }
    
    public function behavior() {
        return [
        \yii\behaviors\BlameableBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'title', 'description', 'price', 'author', 'numpages'], 'required'],
            [['id'], 'integer'],
            [['price', 'numpages'], 'number'],
            [['type'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 1000],
            [['author'], 'string', 'max' => 200],
            [['created_by', 'updated_by', 'user_id'],'safe']
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
            'author' => 'Автор',
            'numpages' => 'Кол-во стр.',
        ];
    }

}
