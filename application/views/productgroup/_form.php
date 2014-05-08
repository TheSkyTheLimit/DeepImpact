<?php
/* @var $this ProductGroupController */
/* @var $model ProductGroup */
/* @var $form CActiveForm */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$ddCat = CHtml::listData(Categories::model()->findAll($criteria), 'catID', 'catName') ;
 }else{
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0 and companyID=:companyID';
	$criteria->params = array(':companyID'=>$UserModel->companyID);
	$ddCat =  CHtml::listData(Categories::model()->findAll($criteria), 'catID', 'catName');
 }

?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-group-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data',),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row"><?php echo $form->labelEx($model,'grpName'); ?>
		<?php echo $form->textField($model,'grpName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'grpName'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'catID'); ?>
		<?php echo $form->dropDownList($model,'catID', $ddCat ,array( 'empty' => '- Select category -',    'style' => 'width:250px')); ?> 
		<?php echo $form->error($model,'catID'); ?>
	
	</div>
	<div class="row"><?php echo $form->labelEx($model,'grpIcon'); ?><?php echo CHtml::activeFileField($model, 'grpIcon'); ?><?php echo $form->error($model,'grpIcon'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'grpImage'); ?><?php echo CHtml::activeFileField($model, 'grpImage'); ?><?php echo $form->error($model,'grpImage'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'isActive'); ?><?php echo $form->checkBox($model,'isActive'); ?><?php echo $form->error($model,'isActive'); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'userID',array('value'=>Yii::app()->user->id)); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'isDeleted',array('value'=>'0')); ?></div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->