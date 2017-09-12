<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarketIntelligence */

$this->title = 'Update Market Intelligence';
$this->params['breadcrumbs'][] = ['label' => 'Market Intelligences', 'url' => ['/dashboard/view?id='.$model->company_id]];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'id' => $model->company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="market-intelligence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
