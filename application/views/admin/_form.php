<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'screenName'); ?>
		<?php echo $form->textField($model,'screenName',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'screenName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userName'); ?>
		<?php echo $form->textField($model,'userName',array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'userName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userPassword'); ?>
		<?php echo $form->passwordField($model,'userPassword',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'userPassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'firstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'privilegeLevel'); ?>
		<?php echo CHtml::dropDownList('privilegeLevel', 'privilegeLevel', array('0'=>'N/A','1'=>'Level 1', '2'=>'Level 2'),array('style'=>'width:250px')); ?>
		<?php echo $form->error($model,'privilegeLevel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'companyID'); ?>
		<?php echo $form->dropDownList($model,'companyID', CHtml::listData(Company::model()->findAll(array('order'=>'comName','condition'=>'isDeleted=0')), 'companyID', 'comName'),array( 'empty' => '- Select category -',    'style' => 'width:250px')); ?> 
		<?php echo $form->error($model,'companyID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'officePhone'); ?>
		<?php echo $form->textField($model,'officePhone',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'officePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilePhone'); ?>
		<?php echo $form->textField($model,'mobilePhone',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'mobilePhone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'isAdmin'); ?>
		<?php echo $form->checkBox($model,'isAdmin'); ?>
		<?php echo $form->error($model,'isAdmin'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'isActive'); ?>
		<?php echo $form->checkBox($model,'isActive'); ?>
		<?php echo $form->error($model,'isActive'); ?>
	</div>
	<div class="row">
	<?php echo $form->hiddenField($model,'isDeleted',array('value'=>'0')); ?>
	<?php echo $form->hiddenField($model,'avatar',array('value'=>'')); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->