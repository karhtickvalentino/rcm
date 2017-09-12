<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessPartner */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="business-partner-form">

    <?php $form = ActiveForm::begin(); ?>









    <div id="opt1" class="descq">

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone1')->textInput() ?>

    <?= $form->field($model, 'telephone2')->textInput() ?>

   <?= $form->field($model, 'website_url')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
