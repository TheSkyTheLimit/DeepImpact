<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
$user = Yii::app()->user->id;
 $curdate =  date("Y-m-d");
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-CreateCompany-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row"><?php echo $form->labelEx($model,'comName'); ?>
<?php echo $form->textField($model,'comName',array('size'=>100,'maxlength'=>250)); ?> <?php echo $form->error($model,'comName'); ?>
	</div>
	<div class="row">	<?php echo $form->labelEx($model,'contactPerson'); ?><?php echo $form->textField($model,'contactPerson',array('size'=>100,'maxlength'=>250)); ?><?php echo $form->error($model,'contactPerson'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'taxID'); ?>
		<?php echo $form->textField($model,'taxID',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'taxID'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'phoneNumber'); ?>
		<?php echo $form->textField($model,'phoneNumber',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'phoneNumber'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'faxNumber'); ?>
		<?php echo $form->textField($model,'faxNumber',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'faxNumber'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'logoIcon'); ?><?php echo CHtml::activeFileField($model, 'logoIcon'); ?><?php echo $form->error($model,'logoIcon'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'logoImage'); ?><?php echo CHtml::activeFileField($model, 'logoImage'); ?>	<?php echo $form->error($model,'logoImage'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'beginDate'); ?>
    <?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'beginDate',
	'attribute'=>'beginDate',
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
      <?php echo $form->error($model,'beginDate'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'endDate'); ?>
		 <?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'name'=>'endDate',
		'attribute'=>'endDate',
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
<?php echo $form->error($model,'endDate'); ?>
	</div>
<div class="row"><?php echo $form->labelEx($model,'isActive'); ?><?php echo $form->checkBox($model,'isActive'); ?><?php echo $form->error($model,'isActive'); ?></div>
<div class="row"><?php echo $form->hiddenField($model,'createUser',array('value'=>$user)); ?></div>
<div class="row buttons"><?php echo CHtml::submitButton('Submit'); ?></div>
<?php $this->endWidget(); ?>

</div><!-- form -->