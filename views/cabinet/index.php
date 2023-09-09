<?php

use yii\bootstrap5\Nav;
use  \yii\helpers\Html;
use \yii\widgets\ListView;

/** @var yii\web\View $this */

$this->title = 'Личный кабинет';
?>

<?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'itemView' => '_user',
]) ?>

