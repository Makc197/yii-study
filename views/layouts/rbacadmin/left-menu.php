<?php

use yii\helpers\Html;
use mdm\admin\components\MenuHelper;
use kartik\sidenav\SideNav;

/* @var $this \yii\web\View */
/* @var $content string */

$controller = $this->context;
$menus = $controller->module->menus;
$route = $controller->route;

foreach ($menus as $i => $menu) {
    $menus[$i]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
}
$this->params['nav-items'] = $menus;

//Массив товаров сгенеренный модулем mdm-admin
$goods = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, null, true)[0];
// Добавление иконки в массив
isset($goods) ? $goods['icon'] = 'folder-open' : '';

//Гененерим полный массив для меню
$leftmenuarr = [
    [
        'url' => '/site/index',
        'label' => Yii::t('main', 'Home'),
        'icon' => 'home'
    ],
//  В центре нашего меню добавим каталог товаров
    $goods,
    [
        'label' => Yii::t('main', 'Help'),
        'icon' => 'question-sign',
        'items' => [
            ['label' => Yii::t('main', 'About'), 'icon' => 'info-sign', 'url' => '/site/about'],
            ['label' =>  Yii::t('main', 'Contact'), 'icon' => 'phone', 'url' => '/site/contact'],
        ],
    ],
];

?>
<?php $this->beginContent($controller->module->mainLayout) ?>
<div class="row">
    <div class="col-sm-3">
        <div id="manager-menu" class="list-group">
            <?php
            foreach ($menus as $menu) {
                $label = Html::tag('i', '', ['class' => 'glyphicon glyphicon-chevron-right pull-right']) .
                    Html::tag('span', Html::encode($menu['label']), []);
                $active = $menu['active'] ? ' active' : '';
                echo Html::a($label, $menu['url'], [
                    'class' => 'list-group-item' . $active,
                ]);
            }
            ?>
        </div>

        <?php
        // Displays SideNav menu
        echo SideNav::widget([
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => Yii::t('main', 'Menu'),
            'items' => $leftmenuarr,
        ]);
        ?>

    </div>
    <div class="col-sm-9">
        <?= $content ?>
    </div>
</div>
<?php
list(, $url) = Yii::$app->assetManager->publish('@mdm/admin/assets');
$this->registerCssFile($url . '/list-item.css');
?>

<?php $this->endContent(); ?>
