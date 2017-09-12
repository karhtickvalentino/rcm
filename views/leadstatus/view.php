<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\leadstatus */

$this->title = 'Lead Status ';
$this->params['breadcrumbs'][] = ['label' => 'Lead Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadstatus-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lead_status_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lead_status_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'lead_status_id',
            'lead_status',
            'lead_status_description',
        ],
    ]) ?>

</div>
