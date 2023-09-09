<?php

//echo '<pre>';
//var_dump($model->currentPassword);
//echo '-----------'.PHP_EOL;


use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Сменить пароль';

$form = ActiveForm::begin([
        'id' => 'change_password-form',
        'layout' => 'horizontal',
]) ?>

<?= $form->field($model, 'currentPassword') ?>
<?= $form->field($model, 'newPassword') ?>
<?= $form->field($model, 'newPasswordRepeat') ?>



<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php
ActiveForm::end() ?>