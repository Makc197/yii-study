<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\widgets\SearchWidget\SearchWidget;
use app\components\widgets\LanguageSwitch\LanguageSwitch;
use mdm\admin\components\MenuHelper;
use kartik\sidenav\SideNav;

AppAsset::register($this);

//Left Menu

//Массив товаров сгенеренный модулем mdm-admin
$goods = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, null, true)[0];

// Добавление иконки glyphicon в массив
isset($goods) ? $goods['icon'] = 'folder-open' : '';

//Гененерим полный массив для меню
$leftmenuarr = [
    [
        'url' => '/site/index',
        'label' => 'Home',
        'icon' => 'home'
    ],
//    [
//        'url' => '/site/index',
//        'label' => 'Goods',
//        'icon' => 'circle-arrow-right',
//        'items' => [
//            ['label' => 'Книги', 'url' => '/book'],
//            ['label' => 'Компакт диски', 'url' => '/cd'],
//            ['label' => 'Прочие товары', 'url' => '/product'],
//        ],
//    ],
//  В центре нашего меню добавим каталог товаров
    $goods,
    [
        'label' => 'Help',
        'icon' => 'question-sign',
        'items' => [
            ['label' => 'About', 'icon' => 'info-sign', 'url' => '/site/about'],
            ['label' => 'Contact', 'icon' => 'phone', 'url' => '/site/contact'],
        ],
    ],
];

//Убираем пустые элементы из массива
function emptyArrayElement($arr){
    return (!empty($arr));
}

$leftmenuarr=array_filter($leftmenuarr, "emptyArrayElement");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
//        'brandLabel' => 'Каталог',
//        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, null, true),
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => Yii::t('rbac-admin', 'Admin menu'),
                'visible' => Yii::$app->user->can('admin'),
                'url' => ['/rbacadmin/user']
            ],
            Yii::$app->user->isGuest ? (
            ['label' => Yii::t('rbac-admin', 'SignIn') . ' (' . Yii::t('rbac-admin', 'Guest') . ')', 'url' => ['/user/login']]
            ) : (
//                '<li>'.MultiLang::widget(['cssClass'=>'pull-right language']);.'</li>'
                '<li>'
                . Html::beginForm(['/user/logout'], 'post')
                . Html::submitButton(
                    Yii::t('rbac-admin', 'SignOut') . ' (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    ?>

    <?=
    SearchWidget::widget([
        'text' => '',
//        'type' => !Yii::$app->user->isGuest ? 'with_select' : 'simple
//        'type' => 'with_select'
        'type' => 'simple'
    ]);
    ?>

    <?=
    LanguageSwitch::widget(['cssClass' => 'language nav navbar-right']);
    ?>

    <?php NavBar::end(); ?>

    <div class="container">

        <div class="row">

            <?php if ($leftmenuarr && $this->context->module->id!='rbacadmin') : ?>
                <div class="col-sm-3">
                    <?php
                     // Displays SideNav menu
                    echo SideNav::widget([
                        'type' => SideNav::TYPE_DEFAULT,
                        'heading' => 'Menu',
                        'items' => $leftmenuarr,
                    ]);
                    ?>
                </div>
            <?php endif ?>

            <div class="col-sm-<?= $leftmenuarr && $this->context->module->id!='rbacadmin' ? '9' : '12' ?>">
                <?php
                echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
                ?>
                <h3>
                    <?= Yii::$app->session->getFlash('regsuccess') == '' ? '' : Yii::$app->session->getFlash('regsuccess'); ?>
                </h3>
                <div>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
