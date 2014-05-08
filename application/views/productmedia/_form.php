<?php
/* @var $this ProductMediaController */
/* @var $model ProductMedia */
/* @var $form CActiveForm */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	 $criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$criteria->order = 'prodName ';
	$ddProduct = CHtml::listData(Products::model()->findAll($criteria), 'prodID', 'prodName');
 }else{
	 $sql = 'Select prodID,prodName from products Where EXISTS (Select * from product_group INNER JOIN  categories ON product_group.catID=categories.catID INNER JOIN admin on categories.companyID=admin.companyID  Where categories.companyID='.$UserModel->companyID.') and isDeleted=0  order by prodName ';
	$UserProduct = Yii::app()->db->createCommand($sql)->queryAll();
	$ddProduct =  CHtml::listData($UserProduct, 'prodID', 'prodName');  
	echo $sql;
 }
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-media-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row"><?php echo $form->labelEx($model,'prodID'); ?>
	<?php echo $form->dropDownList($model,'prodID', $ddProduct ,array( 'empty' => '- Select product -',    'style' => 'width:250px')); ?> 
	<?php echo $form->error($model,'prodID'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'mediaType'); ?><?php echo $form->dropDownList($model, 'mediaType', array('1'=>'Image', '2'=>'Audio','3'=>'Video'),array( 'empty' => '- Select media type -',    'style' => 'width:250px')); ?><?php echo $form->error($model,'mediaType'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'mediaURL'); ?><?php echo CHtml::activeFileField($model, 'mediaURL'); ?><?php echo $form->error($model,'mediaURL'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'shortDesc'); ?><?php echo $form->textArea($model,'shortDesc',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'shortDesc'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'longDesc'); ?><?php echo $form->textArea($model,'longDesc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'longDesc'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'isActive'); ?><?php echo $form->checkBox($model,'isActive'); ?><?php echo $form->error($model,'isActive'); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'createdBy',array('value'=>Yii::app()->user->id)); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'isDeleted',array('value'=>'0')); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'fileSize',array('value'=>'0')); ?></div>
	<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->