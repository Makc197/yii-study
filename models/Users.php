<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $role_id
 * @property string $forename
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $token
 *
 * @property UserRoles $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'integer'],
            [['forename', 'surname', 'username', 'password', 'token'], 'required'],
            [['forename', 'surname', 'username', 'token'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRoles::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'forename' => 'Имя',
            'surname' => 'Фамилия',
            'username' => 'Логин',
            'password' => 'Пароль',
            'token' => 'Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(UserRoles::className(), ['id' => 'role_id']);
    }
}
