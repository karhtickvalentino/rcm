<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\companysearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?//= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'company_address') ?>

    <?= $form->field($model, 'company_city') ?>

    <?= $form->field($model, 'company_country') ?>

    <?php // echo $form->field($model, 'pin') ?>

    <?php // echo $form->field($model, 'company_telephone1') ?>

    <?php // echo $form->field($model, 'company_telephone2') ?>

    <?php // echo $form->field($model, 'website_url') ?>

    <?php // echo $form->field($model, 'number_of_employees') ?>

    <?php // echo $form->field($model, 'number_of_metrimap_users') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
