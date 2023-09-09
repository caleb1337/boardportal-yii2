<?php
$date = date_create($model->date_of_placement);
?>

<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
      'advert_id',
      ['label' => 'date_of_placement', 'value' => \Yii::$app->formatter->asDate($model->date_of_placement, 'medium').' '. date_format($date, 'H:i')],
      'location',
      'category_id',
      'user_id',
      'title',
      'description',
    ],

]) ?>
