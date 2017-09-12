<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\referalsource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="referalsource-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'referal_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referal_source_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
