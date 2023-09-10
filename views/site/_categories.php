<?php

use yii\helpers\Html;
use yii\web\View;

?>


<?php
    if(\Yii::$app->getRequest()->getQueryParam('alias') == $model->alias){
       echo Html::a("<li class='list-group-item border h-100 active' data-id=$model->category_id>{$model->title}</li>",
            ['site/search-by-category', 'alias' => $model->alias]);
    } else {
        echo Html::a("<li class='list-group-item border h-100' data-id=$model->category_id>{$model->title}</li>",
            ['site/search-by-category', 'alias' => $model->alias]);
    }
//$this->registerJs("$.pjax.reload({container:'#w1'});", View::POS_LOAD);
?>








