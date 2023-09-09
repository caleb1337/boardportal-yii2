<?php

use yii\helpers\Html;

//use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */

$this->title = 'Регистрация';
?>
<div class="site-register align-self-center bg-light col-md-8 mx-auto border rounded-3 ">
    <h2 class="text-center my-5">Регистрация</h2>

    <?php
    Pjax::begin([]);
    $form = ActiveForm::begin([
            'id' => 'register-form',
            'options' => ['class' => 'text-dark', 'data' => ['pjax' => true]],
            'fieldConfig' => [
                    'template' => "{label}\n{input}\n{hint}\n{error}",
            ],

    ]); ?>

    <?= $form->field($model, 'login')->textInput() ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary my-5']) ?>
    </div>
    <?php
    ActiveForm::end();
    Pjax::end();
    ?>

</div>
