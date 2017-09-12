<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\partnertype */

$this->title = 'Update Partner Type: ';
$this->params['breadcrumbs'][] = ['label' => 'Partner Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Partner Type', 'url' => ['view', 'id' => $model->partner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partnertype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
