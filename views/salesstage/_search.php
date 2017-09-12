<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\salesstagesesearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salesstage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?//= $form->field($model, 'sales_stage_id') ?>

    <?= $form->field($model, 'stage_name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'stage_activities_collateral') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
