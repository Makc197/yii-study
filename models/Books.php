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
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price', 'author', 'numpages'], 'required'],
            [['price', 'numpages'], 'number'],
            [['type'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 1000],
            [['author'], 'string', 'max' => 200],
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
            'author' => 'Автор',
            'numpages' => 'Кол-во стр.',
        ];
    }
}
