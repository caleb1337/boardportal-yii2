<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php
$this->beginBody() ?>

<header id="header" class="header-area single-page">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.html"><?= Html::encode(Yii::$app->name) ?></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="main-menu main-menu-light">
                        <?php
                        echo Nav::widget([
                            'options' => ['class' => 'main-menu main-menu-light'],
                            'encodeLabels' => false,
                            'items' => [
                                [
                                    'label' => 'Главная',
                                    'url' => ['/site/index'],
                                    'linkOptions' => ['class' => 'active']
                                ],
                                ['label' => 'О нас', 'url' => ['/site/about']],
                                Yii::$app->user->isGuest ? ([
                                    'label' => 'Регистрация',
                                    'url' => ['site/register']
                                ]) : [
                                    'label' => 'Меню' . ' (' . \Yii::$app->user->identity->login . ')',
                                    'items' => [
                                        [
                                            'label' => 'Личный кабинет',
                                            'url' => ['/cabinet/index'],
                                            'linkOptions' => ['class' => 'nav-link text-dark']
                                        ],
                                        [
                                            'label' => 'Мои объявления',
                                            'url' => ['/cabinet/show-my-adverts'],
                                            'linkOptions' => ['class' => 'nav-link text-dark']
                                        ],
                                        [
                                            'label' => 'Новое объявление',
                                            'url' => ['/cabinet/add'],
                                            'linkOptions' => ['class' => 'nav-link text-dark']
                                        ],
                                        [
                                            'label' => 'Изменить личные данные',
                                            'url' => ['/cabinet/redact'],
                                            'linkOptions' => ['class' => 'nav-link text-dark']
                                        ],
                                        [
                                            'label' => 'Сменить пароль',
                                            'url' => ['/cabinet/change-password'],
                                            'linkOptions' => ['class' => 'nav-link text-dark']
                                        ],
                                        [
                                            'label' => Html::beginForm(['/cabinet/logout'])
                                                . Html::submitButton(
                                                    'Выйти' . ' (' . \Yii::$app->user->identity->login . ')',
                                                    ['class' => 'nav-link text-dark logout p-0']
                                                )
                                                . Html::endForm(),
                                            'url' => ['/cabinet/logout'],
                                            'linkOptions' => ['class' => 'text-dark']
                                        ],


                                    ],
                                ],
                                Yii::$app->user->isGuest
                                    ? ['label' => 'Войти', 'url' => ['/site/login']]
                                    : ''
                            ],

                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--    </div>-->
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <div class="row">
            <?php
            if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php
            endif ?>
            <?= Alert::widget() ?>

            <h1><?= Html::encode($this->title) ?></h1>
            <?php
            echo \Yii::$app->controller->id == 'cabinet' ? Nav::widget([
                'options' => ['class' => 'nav nav-pills nav-fill my-3'],
                'items' => [
                    [
                        'label' => 'Личный кабинет',
                        'url' => ['/cabinet/index'],
                        'linkOptions' => ['class' => 'nav-link']
                    ],
                    ['label' => 'Мои объявления', 'url' => ['/cabinet/show-my-adverts']],
                    ['label' => 'Новое объявление', 'url' => ['/cabinet/add']],
                    ['label' => 'Изменить личные данные', 'url' => ['/cabinet/redact']],
                    ['label' => 'Сменить пароль', 'url' => ['/cabinet/change-password']],
                ],
            ]) : '';
            ?>
            <?= $content ?>
        </div>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>


