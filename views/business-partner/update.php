<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessPartner */

$this->title = 'Update Business Partner';
$this->params['breadcrumbs'][] = ['label' => 'Business Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Update Business Partner', 'url' => ['view', 'id' => $model->business_partner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="business-partner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
