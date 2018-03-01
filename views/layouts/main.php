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

AppAsset::register($this);
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
        /*        'items' => [
                    //['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'О нас', 'url' => ['/site/about']],
                    ['label' => 'Обратная связь', 'url' => ['/site/contact']],
                    [
                        'label' => 'Список товаров',
                        'visible' => !Yii::$app->user->isGuest,
                        'items' => [
                            ['label' => 'Книги', 'url' => ['/book']],
                            ['label' => 'Компакт диски', 'url' => ['/cd']],
                            ['label' => 'Прочие товары', 'url' => ['/product']],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">Категория 2</li>',
                            ['label' => 'Еще одна ссылка', 'url' => ['#']],
                        ],
                    ],
                ],*/
    ]);

    /*    $callback = function ($menu) {
            $data = eval($menu['data']);
            return [
                'label' => $menu['name'],
                'url' => [$menu['route']],
                'options' => $data,
                'items' => $menu['children']
            ];
        };

        $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);*/

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
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>

        <h3><?= yii::$app->session->getFlash('regsuccess') == '' ? '' : yii::$app->session->getFlash('regsuccess') ?></h3>

        <div>
            <?= $content ?>
        </div>

        <!-- <// $content ?> -->
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
