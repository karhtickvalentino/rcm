<?php

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use webvimark\extensions\BootstrapSwitch\BootstrapSwitch;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\User $model
 * @var yii\bootstrap\ActiveForm $form
 */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin([
		'id'=>'user',
		'layout'=>'horizontal',
		'validateOnBlur' => false,
	]); ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>
	<?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>
	<?php if ( User::hasPermission('editUserEmail') ): ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
	<?php if ( $model->isNewRecord ): ?>

	
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>

	<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
	<?php endif; ?>
	<?php endif; ?>


	<?= $form->field($model->loadDefaultValues(), 'status')
		->dropDownList(User::getStatusList()) ?>

	<?php if ( User::hasPermission('editUserEmail') ): ?>

		
	<?= $form->field($model, 'email_confirmed')->checkbox() ?>

	<?php endif; ?>



	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<?php if ( $model->isNewRecord ): ?>
				<?= Html::submitButton(
					'<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Create'),
					['class' => 'btn btn-success']
				) ?>
			<?php else: ?>
				<?= Html::submitButton(
					'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('back', 'Save'),
					['class' => 'btn btn-primary']
				) ?>
			<?php endif; ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>

<?php BootstrapSwitch::widget() ?>