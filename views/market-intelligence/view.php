<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MarketIntelligence */

$this->title = 'market intelligence';
$this->params['breadcrumbs'][] = ['label' => 'Market Intelligences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-intelligence-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Company Profile','/dashboard/view?id='.$model->company_id, ['class' => 'btn btn-success']) ?>
        <?= Html::a('Contact Log','/contact-log/create?id='.$model->company_id,['class' => 'btn btn-success']) ?>
        <?= Html::a('View Contact log','/contact-log/index?id='.$model->company_id, ['class' => 'btn btn-success']) ?>
           <?= Html::a('Market Intelligence','/market-intelligence/view?id='.$model->company_id,['class' => 'btn btn-success']) ?>  
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'compitetor',
            'market_intelligence',
            'updated_by'
        ],
    ]) ?>
 <p>
        <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
