<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form ActiveForm */
?>
<div class="company-_form2">

    <?php $form = ActiveForm::begin(); ?>

       
        <?= $form->field($model, 'company_name') ?>
        <?= $form->field($model, 'company_address') ?>
        <?= $form->field($model, 'company_city') ?>
        <?= $form->field($model, 'company_country') ?>
        <?= $form->field($model, 'pin') ?>
        <?= $form->field($model, 'company_telephone1') ?>
        <?= $form->field($model, 'website_url') ?>
        <?= $form->field($model, 'number_of_employees') ?>
        <?= $form->field($model, 'number_of_metrimap_users') ?>

         <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("referal_source_id, CONCAT(referal_source,' (',referal_source_id,')') as fName")])
        ->from('referal_source')
        ->orderBy('referal_source')
        ->all();

        $data = ArrayHelper::map($rows, 'referal_source_id', 'fName');
        echo $form->field($model, 'referal_source')->dropDownList($data,['prompt'=>'Select referal source','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
        <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("company_id, CONCAT(company_name,' (',company_id,')') as fName")])
         ->from('company')
        ->orderBy('company_name')
        ->all();

        $data = ArrayHelper::map($rows, 'company_id', 'fName');
        echo $form->field($model, 'business_partner')->dropDownList($data,['prompt'=>'Select Business Partner','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
       
        <?= $form->field($model, 'scope') ?>
        <?= $form->field($model, 'deal_value') ?>

         <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("sales_stage_id, CONCAT(stage_name,' (',sales_stage_id,')') as fName")])
         ->from('sales_stage')
        ->orderBy('stage_name')
        ->all();

        $data = ArrayHelper::map($rows, 'sales_stage_id', 'fName');
        echo $form->field($model, 'sales_stage')->dropDownList($data,['prompt'=>'Select sales stage','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
       
        <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("lead_status_id, CONCAT(lead_status,' (',lead_status_id,')') as fName")])
         ->from('lead_status')
        ->orderBy('lead_status')
        ->all();

        $data = ArrayHelper::map($rows, 'lead_status_id', 'fName');
        echo $form->field($model, 'lead')->dropDownList($data,['prompt'=>'Select lead status','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
       
       <?= $form->field($model, 'notes')->textarea(['rows'=>4])->label('notes') ?>
        
        <?= $form->field($model, 'company_telephone2') ?>
       
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- company-_form2 -->
