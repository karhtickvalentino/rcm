<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessPartner */
/* @var $form yii\widgets\ActiveForm */

?>
<body onload="ShowHideDiv()">
<div class="business-partner-form">
<?php $form = ActiveForm::begin(); ?>
<script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var chkNo = document.getElementById("chkNo");
        var desc = document.getElementById("desc");
        var dvPassport = document.getElementById("dvPassport");
        if(chkYes.checked)
        {
            dvPassport.style.display =  "block" ;
            desc.style.display =  "none";
            $('.partnerType').val('0');
             $('#name').text('first radio was clicked');
        }
        else if(chkNo.checked)
        {
           dvPassport.style.display =  "none";
           desc.style.display =  "block" ;
           $('.partnerType').val('1');
           
    }
    }
</script>
<span>select partner type</span>
<label for="chkYes">
    <input type="radio" id="chkYes" name="chkPassPort"  value="first name" checked onclick="ShowHideDiv()" />
    person
</label>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chkPassPort"   onclick ="ShowHideDiv()" />
    company
</label>
<hr />


        <?= $form->field($model, 'business_partner_type')->hiddenInput(['maxlength' => true,'class'=> 'partnerType'])->label(false) ?>
       <?= $form->field($model, 'fname')->textInput(['maxlength' => true,'id'=>'name'])->label() ?>


<div id="dvPassport" style="display: none">
 
   
    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

</div>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone1')->textInput() ?>

    <?= $form->field($model, 'telephone2')->textInput() ?>

   <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div id="desc" style="display: none">
<?= $form->field($model, 'website_url')->textInput(['maxlength' => true]) ?>

   
      </div>
   
  <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</body>