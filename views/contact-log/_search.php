<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactLogsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'contact_log_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'contact_method') ?>

    <?= $form->field($model, 'contacted_person') ?>

    <?= $form->field($model, 'assigned_to') ?>

    <?php // echo $form->field($model, 'followup_date') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
