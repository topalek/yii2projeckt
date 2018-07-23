<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post_view',
        'options' => [
            'tag' => 'div',
            'class' => 'webinar',
        ],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-md-12',
        ],
    ]); ?>
</div>
