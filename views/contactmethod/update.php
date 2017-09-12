<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\contactmethod */

$this->title = 'Update Contact Method: ' . $model->contact_method;
$this->params['breadcrumbs'][] = ['label' => 'Contactmethods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'contact method', 'url' => ['view', 'id' => $model->contact_method_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contactmethod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
