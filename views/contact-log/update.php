<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactLog */

$this->title = 'Update Contact Log: ';
$this->params['breadcrumbs'][] = ['label' => 'Contact Logs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'update', 'url' => ['view', 'id' => $model->contact_log_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
        'id'=>$id
    ]) ?>

</div>
