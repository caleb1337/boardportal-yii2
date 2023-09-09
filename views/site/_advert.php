<?php

use yii\helpers\Html;



?>

<div class="single-job mb-4 d-lg-flex justify-content-between">
    <div class="job-text">
        <h3><?= Html::encode($model->title) ?></h3>
        <ul class="mt-4">
            <li class="mb-3">
                <h4>
                    <i class="fa fa-price-marker"></i>
                    <b class="text-dark">
<!--                        --><?php //= Html::encode(Yii::$app->formatter->asCurrency("{$model->price}", '₽', '')) ?>
                        <?= Html::encode($model->price) ?>
                    </b>


                </h4>
            </li>
            <li class="mb-3">
                <h5>
                    <i class="fa fa-map-marker"></i>
                    <b class="text-dark">Местоположение:</b>
                    <?= Html::encode($model->location) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <i class="fa fa-pie-chart"></i>
                    <b class="text-dark">Категория:</b>
                    <?= Html::encode($model->category->title) ?>
                </h5>
            </li>
            <li>
                <h5>
                    <i class="fa fa-clock-o"></i>
                    <b class="text-dark">Дата публикации:</b>
                    <?php
                    \Yii::$app->formatter->locale = 'ru-RU';
                    \Yii::$app->timeZone = 'Europe/Moscow';
                    echo Html::encode(\Yii::$app->formatter->asRelativeTime($model->date_of_placement, 'now')) ; ?>
                </h5>
            </li>
            <?= Html::a('Просмотреть', "index.php?r=site%2Fview&advert_id={$model->advert_id}", ['class' => 'btn btn-warning w-50 align-self-center']) ?>
        </ul>
    </div>
    <div class="job-img align-self-center">
        <img src="assets/images/job1.png" alt="job">
    </div>

</div>



