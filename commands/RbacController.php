<?php

namespace app\commands;

use yii\console\Controller;

class RbacController extends Controller {
    
    public function actionDo() {

    $auth = \Yii::$app->authManager;
    
    $reader = $auth->createRole('reader');
    $book_reader = $auth->createRole('book_reader');
    $author = $auth->createRole('author');
    $editor = $auth->createRole('editor');
    $admin = $auth->createRole('admin');

    $auth->add($reader);
    $auth->add($book_reader);
    $auth->add($author);
    $auth->add($editor);
    $auth->add($admin);

    $auth->addChild($editor, $reader);
    $auth->addChild($admin, $author);
    $auth->addChild($admin, $editor);

    $DeleteOwnRule = new \app\rule\DeleteOwnRule;
    $UpdateOwnRule = new \app\rule\UpdateOwnRule;
    $ViewBookRule = new \app\rule\ViewBookRule;
    $ViewOwnRule = new \app\rule\ViewOwnRule;

    $auth->add($DeleteOwnRule);
    $auth->add($UpdateOwnRule);
    $auth->add($ViewBookRule);
    $auth->add($ViewOwnRule);

    // add "createPost" permission
    $create = $auth->createPermission('create');
    $view = $auth->createPermission('view');
    $update = $auth->createPermission('update');
    $delete = $auth->createPermission('delete');

    $auth->add($create);
    $auth->add($view);
    $auth->add($update);
    $auth->add($delete);

    $viewOwn = $auth->createPermission('viewOwn');
    $viewOwn->ruleName = $ViewOwnRule->name;

    $viewBook = $auth->createPermission('viewBook');
    $viewBook->ruleName = $ViewBookRule->name;

    $updateOwn = $auth->createPermission('updateOwn');
    $updateOwn->ruleName = $UpdateOwnRule->name;

    $deleteOwn = $auth->createPermission('deleteOwn');
    $deleteOwn->ruleName = $DeleteOwnRule->name;

    $auth->add($viewOwn);
    $auth->add($viewBook);
    $auth->add($updateOwn);
    $auth->add($deleteOwn);

    // пермишен - пермишен

    $auth->addChild($viewOwn, $view);
    $auth->addChild($viewBook, $view);

    $auth->addChild($updateOwn, $update);

    $auth->addChild($deleteOwn, $delete);

    // роли - пермишены

    $auth->addChild($author, $create);

    $auth->addChild($reader, $view);
    $auth->addChild($author, $viewOwn);
    $auth->addChild($book_reader, $viewBook);

    $auth->addChild($editor, $update);
    $auth->addChild($author, $updateOwn);

    $auth->addChild($admin, $delete);
    $auth->addChild($author, $deleteOwn);
    
    // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
    // обычно реализуемый в модели User.
    $auth->assign($book_reader, 3);
    $auth->assign($reader, 2);
    $auth->assign($admin, 1);
    }
}
