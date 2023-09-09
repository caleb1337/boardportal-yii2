<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = 'Ошибка!';
?>
<div class="site-error">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($exception)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
