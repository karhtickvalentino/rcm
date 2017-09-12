<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\partnertype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partnertype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partner_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'partner_type_decription')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
