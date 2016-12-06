<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property double $price
 * @property string $author
 * @property string $numpages
 *
 * @property Users $user
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
            [['user_id', 'title', 'description', 'price', 'author', 'numpages'], 'required'],
            [['user_id'], 'integer'],
            [['price', 'numpages'], 'number'],
            [['type'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 1000],
            [['author'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type' => 'Тип',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'price' => 'Цена',
            'author' => 'Автор',
            'numpages' => 'Кол-во стр.',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
