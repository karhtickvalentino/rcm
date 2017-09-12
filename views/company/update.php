<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\company */

$this->title = 'Update Company: ';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'company details', 'url' => ['view', 'id' => $modelCustomer->company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelCustomer' =>$modelCustomer,
        'modelsAddress' =>$modelsAddress,
        
    ]) ?>

</div>
