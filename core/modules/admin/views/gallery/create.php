<?php
/**
 * Created by topalek
 * Date: 06.09.2018
 * Time: 16:18
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */

$this->title = 'Create Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-create box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
