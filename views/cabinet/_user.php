<?php

use yii\helpers\Html;

?>


<div class="single-job mb-4 d-lg-flex justify-content-between">
    <div class="job-img align-self-center col-3">
        <img src="assets/images/job1.png" alt="job">
    </div>
    <div class="job-text col">
        <h3><?= Html::encode("{$model->user->first_name} {$model->user->last_name}") ?></h3>

        <ul class="mt-4">
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Идентификатор пользователя:</b>
                    <?= Html::encode($model->user->id) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Логин:</b>
                    <?= Html::encode($model->user->login) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Дата регистрации:</b>
                    <?= Html::encode($model->user->date_of_registration) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Телефон:</b>
                    <?= Html::encode($model->phone) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Местоположение:</b>
                    <?= Html::encode($model->location) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Активных объявлений:</b>
                    <?= Html::encode(
                            $model->num_of_active_adverts === null ? '0' : $model->num_of_active_adverts
                    ) ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Аккаунт:</b>
                    <?= Html::encode($model->verified === 1 ? 'Подтвержден' : 'Не подтвержден') ?>
                </h5>
            </li>
            <li class="mb-3">
                <h5>
                    <b class="text-dark">Привелегии:</b>
                    <?php
                    switch ($model->user->role) {
                        case 'admin':
                            echo 'Администратор';
                            break;
                        default:
                            echo 'Пользователь';
                    }
                    ?>
                </h5>

            </li>
        </ul>
    </div>
</div>
