<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Сменить пароль';



$form = ActiveForm::begin([
    'id' => 'change_password-form',
    'layout' => 'horizontal',

]) ?>



<?= $form->field($model, 'currentPassword', ['enableAjaxValidation' => true]) ?>
<?= $form->field($model, 'newPassword') ?>
<?= $form->field($model, 'newPasswordRepeat') ?>



<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php
ActiveForm::end();

$js = <<<JS
var form = $('change_password-form');
form.on('beforeSubmit', function(){
    var data = form.serialize();
    $.ajax({
    url: form.attr('action'),
    type:'POST',
    data: data,
    success: function (res){
        console.log(res);
        form[0].reset();
    },
    error: function(){
        alert('Error!');
    }
    });
    return false;
});
JS;
$this->registerJs($js);




?>