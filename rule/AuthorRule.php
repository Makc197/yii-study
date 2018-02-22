<?php

namespace app\rule;

use Yii;
use yii\rbac\Rule;
use app\components\ModelHelper;

class AuthorRule extends Rule {

    public $name = 'isAuthor';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    //Передаем сюда модель - запись из БД - например book, cd, product
    //в каждой записи есть поле created_by где user_id автора - сравниваем с текущим пользователем 
    //и если совпадает - возвращаем true, в противном случае false
    public function execute($user, $item, $params) {
        //Т.к. при использовании mdm yii2-admin в params пусто, 
        //определяем модель через текущий url по имени контроллера
        $modelHelper = ModelHelper::getModel();
        if ($model = $modelHelper::findOne($params['id'])) {
            $created_by = isset($model->created_by) ? $model->created_by : false;
            return $created_by == $user;
        }
        return false;
    }

}
