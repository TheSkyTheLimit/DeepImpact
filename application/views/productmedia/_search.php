<?php
/* @var $this ProductMediaController */
/* @var $model ProductMedia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mediaID'); ?>
		<?php echo $form->textField($model,'mediaID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prodID'); ?>
		<?php echo $form->textField($model,'prodID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mediaURL'); ?>
		<?php echo $form->textField($model,'mediaURL',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fileSize'); ?>
		<?php echo $form->textField($model,'fileSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shortDesc'); ?>
		<?php echo $form->textField($model,'shortDesc',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longDesc'); ?>
		<?php echo $form->textArea($model,'longDesc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mediaType'); ?>
		<?php echo $form->textField($model,'mediaType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isActive'); ?>
		<?php echo $form->textField($model,'isActive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDeleted'); ?>
		<?php echo $form->textField($model,'isDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdBy'); ?>
		<?php echo $form->textField($model,'createdBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createDate'); ?>
		<?php echo $form->textField($model,'createDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->