<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\salesstage */

$this->title = 'Create Sales Stage';
$this->params['breadcrumbs'][] = ['label' => 'Sales Stages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salesstage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
