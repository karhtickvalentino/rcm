<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\partnertype */

$this->title = 'Partner Type';
$this->params['breadcrumbs'][] = ['label' => 'Partner Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partnertype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->partner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->partner_id], [
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
            
            'partner_type',
            'partner_type_decription',
        ],
    ]) ?>

</div>
