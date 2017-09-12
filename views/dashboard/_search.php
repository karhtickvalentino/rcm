<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DashboardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dashboard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'company_address') ?>

    <?= $form->field($model, 'company_city') ?>

    <?php // echo $form->field($model, 'company_country') ?>

    <?php // echo $form->field($model, 'pin') ?>

    <?php // echo $form->field($model, 'company_telephone1') ?>

    <?php // echo $form->field($model, 'company_telephone2') ?>

    <?php // echo $form->field($model, 'website_url') ?>

    <?php // echo $form->field($model, 'number_of_employees') ?>

    <?php // echo $form->field($model, 'number_of_metrimap_users') ?>

    <?php // echo $form->field($model, 'referal_source') ?>

    <?php // echo $form->field($model, 'business_partner') ?>

    <?php // echo $form->field($model, 'scope') ?>

    <?php // echo $form->field($model, 'deal_value') ?>

    <?php // echo $form->field($model, 'sales_stage') ?>

    <?php // echo $form->field($model, 'lead') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'customer_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
