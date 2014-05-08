<?php
/* @var $this CustomersController */
/* @var $model Customers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'screenName'); ?>
		<?php echo $form->textField($model,'screenName',array('style'=>'width:245px','maxlength'=>250)); ?>
		<?php echo $form->error($model,'screenName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('style'=>'width:245px','maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'firstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'officePhone'); ?>
		<?php echo $form->textField($model,'officePhone',array('style'=>'width:245px','maxlength'=>20)); ?>
		<?php echo $form->error($model,'officePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilePhone'); ?>
		<?php echo $form->textField($model,'mobilePhone',array('style'=>'width:245px','maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobilePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instragram'); ?>
		<?php echo $form->textField($model,'instragram',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'instragram'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tweeter'); ?>
		<?php echo $form->textField($model,'tweeter',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'tweeter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'line'); ?>
		<?php echo $form->textField($model,'line',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferredLang'); ?>
		<?php echo $form->textField($model,'preferredLang',array('style'=>'width:245px','maxlength'=>50)); ?>
		<?php echo $form->error($model,'preferredLang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imei'); ?><?php echo $form->textField($model,'imei',array('style'=>'width:245px','maxlength'=>250)); ?>
		<?php echo $form->error($model,'imei'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'deviceType'); ?>
		<?php echo $form->dropDownList($model, 'deviceType', array('0'=>'N/A','1'=>'Iphone', '2'=>'Android'),array('style'=>'width:250px')); ?>
		<?php echo $form->error($model,'deviceType'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'deviceID'); ?>
		<?php echo $form->textArea($model,'deviceID',array('rows'=>5, 'cols'=>45)); ?>
		<?php echo $form->error($model,'deviceID'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->textArea($model,'avatar',array('rows'=>5, 'cols'=>45)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'isActivated'); ?>
		<?php echo $form->checkBox($model,'isActivated'); ?>
		<?php echo $form->error($model,'isActivated'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'activatedDate'); ?>
  <?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'activatedDate',
	'attribute'=>'activatedDate',
	 'model'=>$model, 
	 'options'=>array(
        'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'2000:2099',
        'minDate' => '2000-01-01',      // minimum date
        'maxDate' => '2099-12-31',      // maximum date
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));?>
		<?php echo $form->error($model,'activatedDate'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'isActive'); ?>
		<?php echo $form->checkBox($model,'isActive'); ?>
		<?php echo $form->error($model,'isActive'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'isDeleted'); ?>
		<?php echo $form->checkBox($model,'isDeleted'); ?>
		<?php echo $form->error($model,'isDeleted'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'lastLogin'); ?>
  <?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'lastLogin',
	'attribute'=>'lastLogin',
	 'model'=>$model, 
	 'options'=>array(
        'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'2000:2099',
        'minDate' => '2000-01-01',      // minimum date
        'maxDate' => '2099-12-31',      // maximum date
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));?>
<?php echo $form->error($model,'lastLogin'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->