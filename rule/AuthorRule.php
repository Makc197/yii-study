<?php

namespace app\rule;

use Yii;
use yii\rbac\Rule;

class AuthorRule extends Rule {

    public $name = 'isAuthor';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    //Передаем сюда модель - запись из БД - например book, cd, product
    //в каждой записи есть поле createdBy где user_id автора - сравниваем с текущим пользователем 
    //и если совпадает - возвращаем true, в противном случае false
    public function execute($user, $item, $params) {
        return isset($params['item']) ? $params['item']->createdBy == $user : false;
    }

}
