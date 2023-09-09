<?php

//echo '<pre>';
//var_dump($user_model);
//echo '-----------'.PHP_EOL;
//var_dump($info_model);

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Изменить личные данные';

$form = ActiveForm::begin([
        'id' => 'managers-form',
        'layout' => 'horizontal',
]) ?>
<?= $form->field($user_model, 'login') ?>
<?= $form->field($user_model, 'first_name') ?>
<?= $form->field($user_model, 'last_name') ?>
<?= $form->field($info_model, 'phone') ?>
<?= $form->field($info_model, 'location')?>
<?= $form->field($user_model, 'role')->textInput(['disabled' => true]) ?>
<?= $form->field($info_model, 'verified')->textInput(['value' => $info_model->verified == 1? 'Подтвержден' : 'Не подтвержден' ,'disabled' => true])->label('Аккаунт')?>



<?php //= $form->field($model, 'avatar') ?>


<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>