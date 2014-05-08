<?php
/* @var $this PushNotificationController */
/* @var $model PushNotification */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pushID'); ?>
		<?php echo $form->textField($model,'pushID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'companyID'); ?>
		<?php echo $form->textField($model,'companyID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'startDate'); ?>
		<?php echo $form->textField($model,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endDate'); ?>
		<?php echo $form->textField($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pushURL'); ?>
		<?php echo $form->textArea($model,'pushURL',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pushData'); ?>
		<?php echo $form->textArea($model,'pushData',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDeleted'); ?>
		<?php echo $form->textField($model,'isDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userCreated'); ?>
		<?php echo $form->textField($model,'userCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdDate'); ?>
		<?php echo $form->textField($model,'createdDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->