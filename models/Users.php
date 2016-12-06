<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 50],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findByUsername($username) {
        return self::findOne(['username'=>$username]);
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
    public static function findIdentityByAccessToken($token, $type = null){}
}
