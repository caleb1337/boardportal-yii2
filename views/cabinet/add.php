<?php
/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$items = ArrayHelper::map($categories,'category_id','title');

//echo '<pre>';
//print_r($items);
//echo '<pre>';

$this->title = 'Мои объявления';

$form = ActiveForm::begin([
        'id' => 'add-advert-form',
        'layout' => 'horizontal',
]) ?>
<?= $form->field($model, 'category_id')->dropDownList($items)->label('Категория')?>
<!--Для категори айди сделать дропдаун с выбором категории-->

<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'price') ?>
<?= $form->field($model, 'location')->textInput() ?>
<?= $form->field($model, 'description')->textarea()?>

<!--В контроллере записывать поле status как 1 (активное), поле user_id записывать с помощью user->identity->id-->
<!--date_of_placement писать с помощью функции date()-->

<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>






