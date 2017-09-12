<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\leadstatus */

$this->title = 'Update Lead Status: ';
$this->params['breadcrumbs'][] = ['label' => 'Lead Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'lead status ', 'url' => ['view', 'id' => $model->lead_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leadstatus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
