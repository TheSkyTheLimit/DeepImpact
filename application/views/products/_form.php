<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	 $criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$criteria->order = 'grpName ';
	$ddGroup = CHtml::listData(ProductGroup::model()->findAll($criteria), 'grpID', 'grpName');
 }else{
	 $sql = 'Select grpID,grpName from product_group Where EXISTS (Select * from categories INNER JOIN admin on categories.companyID=admin.companyID  Where categories.catID=product_group.catID and admin.companyID='.$UserModel->companyID.') and isDeleted=0  order by grpName ';
	$UserGrp = Yii::app()->db->createCommand($sql)->queryAll();
	$ddGroup = CHtml::listData($UserGrp, 'grpID', 'grpName');
	//echo $sql;
 }
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
				<?php echo $form->labelEx($model,'grpID'); ?>
				<?php echo $form->dropDownList($model,'grpID', $ddGroup ,array( 'empty' => '- Select product group -',    'style' => 'width:275px')); ?> 
	
		<?php echo $form->error($model,'grpID'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'prodName'); ?>
		<?php echo $form->textField($model,'prodName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'prodName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prodLongName'); ?>
		<?php echo $form->textField($model,'prodLongName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'prodLongName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prodShortDesc'); ?>
		<?php echo $form->textArea($model,'prodShortDesc',array('rows'=>3, 'cols'=>45)); ?>
		<?php echo $form->error($model,'prodShortDesc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prodDesc'); ?>
		<?php echo $form->textArea($model,'prodDesc',array('rows'=>5, 'cols'=>45)); ?>
		<?php echo $form->error($model,'prodDesc'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'qrData'); ?>
		<?php echo $form->textArea($model,'qrData',array('rows'=>3, 'cols'=>45)); ?>
		<?php echo $form->error($model,'qrData'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?><?php echo $form->dropDownList($model, 'rating', array('0'=>'N/A','1'=>'1', '2'=>'2','3'=>'3','4'=>'4','5'=>'5'),array('style'=>'width:250px')); ?><?php echo $form->error($model,'rating'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'prodIcon'); ?><?php echo CHtml::activeFileField($model, 'prodIcon'); ?><?php echo $form->error($model,'prodIcon'); ?></div>
	<div class="row">
		<?php echo $form->labelEx($model,'maker'); ?>
		<?php echo $form->textField($model,'maker',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'maker'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'isActive'); ?>
		<?php echo $form->checkBox($model,'isActive'); ?>
		<?php echo $form->error($model,'isActive'); ?>
	</div>
	<div class="row">
		<?php echo $form->hiddenField($model,'isDeleted',array('value'=>'0')); ?>
		<?php echo $form->hiddenField($model,'createdBy',array('value'=>Yii::app()->user->id)); ?>
	</div> 
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->