<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\referalsource */

$this->title = 'Referal Source';
$this->params['breadcrumbs'][] = ['label' => 'Referal Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referalsource-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->referal_source_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->referal_source_id], [
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
            
            'referal_source',
            'referal_source_description',
        ],
    ]) ?>

</div>
