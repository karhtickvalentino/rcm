<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\datepicker\DatePicker;
use yii\widgets\DetailView;
use app\models\Company;
use app\models\MarketIntelligence;
/* @var $this yii\web\View */
/* @var $model app\models\ContactLog */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="contact-log-form">

 <p>
<?php 
//Yii::$app->user->returnUrl = Yii::$app->request->referrer
// $current_user=Yii::$app->user->id;
// $url=$this->redirect(Yii::$app->session['userView'.$current_user.'returnURL']);
?>
        <?= Html::a('Company Profile','/dashboard/view?id='.$id, ['class' => 'btn btn-success']) ?>
        <?= Html::a('Contact Log','#',['class' => 'btn btn-success']) ?>
        <?= Html::a('View Contact Log','/contact-log/index?id='.$id, ['class' => 'btn btn-success']) ?>
         <?php
        $mi = MarketIntelligence::find()->where(['company_id' => $id])->one();
        if(empty($mi)){
            echo Html::a('Market Intelligence','/market-intelligence/create?id='.$id,['class' => 'btn btn-success']);
        }
        else{
            echo Html::a('Market Intelligence','/market-intelligence/view?id='.$id,['class' => 'btn btn-success']);
        }
        ?> 
    </p>








    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

  <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Contact Log</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsAddress[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'company_id',
                    'contact_method',
                    'contacted_person',
                    'assigned_to',
                    'followup_date',
                    'comments',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsAddress as $i => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">contact log:</h3><?= ($i + 1) ?>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]contact_log_id");
                                

                            }
                        ?>
                         <?php 
                        $rows = (new \yii\db\Query())
                        ->select([new \yii\db\Expression("company_id, CONCAT(company_name,' (',company_id,')') as fName")])
                        ->from('company')
                        ->where(['company_id' => $id])
                        ->orderBy('company_name')
                        ->all();

                        $data = ArrayHelper::map($rows, 'company_id', 'fName');

                        echo $form->field($modelAddress, "[{$i}]company_id")->dropDownList($data,['disabled' => true])->label('client'); ?>

                                       
                        <div class="row">
                            <div class="col-sm-6">
                                            <?php 
                                $rows = (new \yii\db\Query())
                                ->select([new \yii\db\Expression("contact_method_id, CONCAT(contact_method,' (',contact_method_id,')') as fName")])
                                ->from('contact_method')
                                ->orderBy('contact_method')
                                ->all();

                                $data = ArrayHelper::map($rows, 'contact_method_id', 'fName');
                                echo $form->field($modelAddress, "[{$i}]contact_method")->dropDownList($data,['prompt'=>'Select contact method','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
                                               
                            </div>
                            <div class="col-sm-6">
                                                 <?php 
                                $rows = (new \yii\db\Query())
                                ->select([new \yii\db\Expression("customer_id, CONCAT(first_name, '(',customer_id,')') as fName")])
                                ->from('person')
                                 ->where(['company_id' => $id])
                                ->orderBy('first_name')
                                ->all();

                                $data = ArrayHelper::map($rows, 'customer_id', 'fName');
                                echo $form->field($modelAddress, "[{$i}]contacted_person")->dropDownList($data,['prompt'=>'Select contacted person','disabled' => (!empty($idExist) OR !empty($idExistAcc))]); ?>
                                               
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                               
                                <div class="col-sm-6">
                                   <?= $form->field($modelAddress, "[{$i}]followup_date")->widget(DatePicker::classname(), ['language' => 'en','class' => 'dPick',  'clientOptions' => ['dateFormat' => 'yy-mm-dd',]]) ?>
                                </div>
                                <div class="col-sm-12">
                                 <?= $form->field($modelAddress, "[{$i}]comments")->textarea(['rows'=>4])->label('comments') ?>
                                 </div>
                            </div><!-- .row -->
                            </div>
        </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => $modelAddress->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
