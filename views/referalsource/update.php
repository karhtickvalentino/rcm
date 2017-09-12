<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\referalsource */

$this->title = 'Update Referal Source';
$this->params['breadcrumbs'][] = ['label' => 'Referal Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'referal Source', 'url' => ['view', 'id' => $model->referal_source_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referalsource-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
