<?php

use yii\helpers\Html;
use yii\web\View;

?>


<?php
    if(\Yii::$app->getRequest()->getQueryParam('category_id') == $model->category_id){
       echo Html::a("<li class='list-group-item border h-100 active' data-id=$model->category_id>{$model->title}</li>",
            ['site/search-by-category', 'category_id' => $model->category_id]);
    } else {
        echo Html::a("<li class='list-group-item border h-100' data-id=$model->category_id>{$model->title}</li>",
            ['site/search-by-category', 'category_id' => $model->category_id]);
    }
//$this->registerJs("$.pjax.reload({container:'#w1'});", View::POS_LOAD);
?>








