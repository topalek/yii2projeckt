<?php
/**
 * Created by topalek
 * Date: 06.09.2018
 * Time: 16:19
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */

$this->title = 'Update Gallery: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-update box box-primary admin-section">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
