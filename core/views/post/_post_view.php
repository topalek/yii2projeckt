<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

?>
<div class="post">
    <div class="media">
        <div class="media-left">
            <?= Html::a(Html::img('https://loremflickr.com/200/200',['class'=>'img-responsive img-rounded']),['/post/view','url'=>$model->slug])?>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= Html::a($model->title,['/post/view','url'=>$model->slug])?>
            </h4>
            <p><?= $model->text?></p>
            <?= Html::a('More...',['/post/view','url'=>$model->slug],['class'=> 'btn btn-default'])?>
        </div>
    </div>
</div>
<br>
