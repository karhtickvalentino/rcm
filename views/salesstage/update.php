<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\salesstage */

$this->title = 'Update Sales Stage';
$this->params['breadcrumbs'][] = ['label' => 'Sales Stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'sales Stage', 'url' => ['view', 'id' => $model->sales_stage_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salesstage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
