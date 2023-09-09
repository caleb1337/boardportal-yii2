<?php

/** @var yii\web\View $this */


use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Главная';
?>

<?php Pjax::begin(['timeout' => 5000, 'id' => 'pjax_container']) ?>

<div class="single-content1">

    <?= /** @lang text */
    '<ul class="list-group list-group-horizontal">' ?>

    <?= ListView::widget([
        'dataProvider' => $categories,
        'itemView' => '_categories',
        'layout' => "{items}",
        'options' => ['class' => 'd-flex'],
        'itemOptions' => ['tag' => false,]
    ]); ?>

    <?= /** @lang text */
    '</ul>' ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_advert',
        'id' => 'advert-widget',
    ]) ?>

</div>
<?php Pjax::end() ?>


