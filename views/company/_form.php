<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\company */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("person: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("person: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($modelCustomer, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCustomer, 'company_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCustomer, 'company_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCustomer, 'company_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCustomer, 'pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCustomer, 'company_telephone1')->textInput() ?>

    <?= $form->field($modelCustomer, 'company_telephone2')->textInput() ?>

    <?= $form->field($modelCustomer, 'website_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelCustomer, 'number_of_employees')->textInput() ?>

    <?= $form->field($modelCustomer, 'number_of_metrimap_users')->textInput() ?>
     <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("referal_source_id, CONCAT(referal_source,' (',referal_source_id,')') as fName")])
        ->from('referal_source')
        ->orderBy('referal_source')
        ->all();

        $data = ArrayHelper::map($rows, 'referal_source_id', 'fName');
        echo $form->field($modelCustomer, 'referal_source')->dropDownList($data,['prompt'=>'Select referal source','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
        
        <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("business_partner_id, CONCAT(fname,' (',business_partner_id,')') as fName")])
         ->from('business_partner')
        ->orderBy('fname')
        ->all();

        $data = ArrayHelper::map($rows, 'business_partner_id', 'fName');
        echo $form->field($modelCustomer, 'business_partner')->dropDownList($data,['prompt'=>'Select Business Partner','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>

        <?= $form->field($modelCustomer, 'scope')->textInput() ?>

        <?= $form->field($modelCustomer, 'deal_value')->textInput() ?>

                <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("sales_stage_id, CONCAT(stage_name,' (',sales_stage_id,')') as fName")])
         ->from('sales_stage')
        ->orderBy('stage_name')
        ->all();

        $data = ArrayHelper::map($rows, 'sales_stage_id', 'fName');
        echo $form->field($modelCustomer, 'sales_stage')->dropDownList($data,['prompt'=>'Select sales stage','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>

                <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("lead_status_id, CONCAT(lead_status,' (',lead_status_id,')') as fName")])
         ->from('lead_status')
        ->orderBy('lead_status')
        ->all();

        $data = ArrayHelper::map($rows, 'lead_status_id', 'fName');
        echo $form->field($modelCustomer, 'lead')->dropDownList($data,['prompt'=>'Select lead status','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
            <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

 
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsAddress[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'first_name',
                    'last_name',
                    'address',
                    'email1',
                    'telephone1',
                    'country',
                    'city',
                    'remarks'
                ],
            ]); ?>

               <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-envelope"></i> Contact Person
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
            <?php foreach ($modelsAddress as $i => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetItem -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Person</h3>
                        <div class="pull-right">
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]customer_id");
                                

                            }
                        ?>
                        <?= $form->field($modelAddress, "[{$i}]first_name")->textInput(['maxlength' => true]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$i}]last_name")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAddress, "[{$i}]address")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelAddress, "[{$i}]email1")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelAddress, "[{$i}]city")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelAddress, "[{$i}]country")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelAddress, "[{$i}]telephone1")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelAddress, "[{$i}]remarks")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    

    



    <?= $form->field($modelCustomer, 'notes')->textarea(['rows'=>4])->label('Notes') ?>

  
    <div class="form-group">
        <?= Html::submitButton($modelCustomer->isNewRecord ? 'Create' : 'Update', ['class' => $modelCustomer->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
