<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-new-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'isActive'); ?>
		<?php echo $form->textField($model,'isActive'); ?>
		<?php echo $form->error($model,'isActive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isDeleted'); ?>
		<?php echo $form->textField($model,'isDeleted'); ?>
		<?php echo $form->error($model,'isDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createUser'); ?>
		<?php echo $form->textField($model,'createUser'); ?>
		<?php echo $form->error($model,'createUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comName'); ?>
		<?php echo $form->textField($model,'comName'); ?>
		<?php echo $form->error($model,'comName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactPerson'); ?>
		<?php echo $form->textField($model,'contactPerson'); ?>
		<?php echo $form->error($model,'contactPerson'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taxID'); ?>
		<?php echo $form->textField($model,'taxID'); ?>
		<?php echo $form->error($model,'taxID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phoneNumber'); ?>
		<?php echo $form->textField($model,'phoneNumber'); ?>
		<?php echo $form->error($model,'phoneNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faxNumber'); ?>
		<?php echo $form->textField($model,'faxNumber'); ?>
		<?php echo $form->error($model,'faxNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logoIcon'); ?>
		<?php echo $form->textField($model,'logoIcon'); ?>
		<?php echo $form->error($model,'logoIcon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logoImage'); ?>
		<?php echo $form->textField($model,'logoImage'); ?>
		<?php echo $form->error($model,'logoImage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beginDate'); ?>
		<?php echo $form->textField($model,'beginDate'); ?>
		<?php echo $form->error($model,'beginDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo $form->textField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createDate'); ?>
		<?php echo $form->textField($model,'createDate'); ?>
		<?php echo $form->error($model,'createDate'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->