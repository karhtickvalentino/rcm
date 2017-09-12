<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Company;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ContactLog */
/* @var $form ActiveForm */
?>
<div class="contact-log-_form2">

    <?php $form = ActiveForm::begin(); ?>

         
         <?php 
        $rows = (new \yii\db\Query())
        ->select([new \yii\db\Expression("customer_id, CONCAT(first_name,' (',customer_id,')') as fName")])
         ->from('person')
        ->orderBy('first_name')
        ->all();

        $data = ArrayHelper::map($rows, 'contacted_person', 'fName');
        echo $form->field($model, 'contacted_person')->dropDownList($data,['prompt'=>'Select contacted person','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
      

        <?= $form->field($model, 'contact_method') ?>
        <?= $form->field($model, 'contacted_person') ?>
        <?= $form->field($model, 'assigned_to') ?>
        <?= $form->field($model, 'followup_date') ?>
        <?= $form->field($model, 'comments') ?>
        <?= $form->field($model, 'created_on') ?>
        <?= $form->field($model, 'updated_on') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- contact-log-_form2 -->
