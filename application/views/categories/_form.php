<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	 $criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$criteria->order = 'comName';
	$ddCompany = CHtml::listData(Company::model()->findAll($criteria), 'companyID', 'comName') ;
 }else{
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0 and companyID=:companyID';
	$criteria->params = array(':companyID'=>$UserModel->companyID);
	$criteria->order = 'comName';
	$ddCompany = CHtml::listData(Company::model()->findAll($criteria), 'companyID', 'comName');
 }

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row"><?php echo $form->labelEx($model,'catName'); ?>
		<?php echo $form->textField($model,'catName',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'catName'); ?>
	</div>
	<div class="row"><?php echo $form->labelEx($model,'catIcon'); ?><?php echo CHtml::activeFileField($model, 'catIcon'); ?><?php echo $form->error($model,'catIcon'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'catImage'); ?><?php echo CHtml::activeFileField($model, 'catImage'); ?><?php echo $form->error($model,'catImage'); ?></div>
	<div class="row"><?php echo $form->labelEx($model,'companyID'); ?><?php echo $form->dropDownList($model,'companyID',$ddCompany,array( 'empty' => '- Select company -',    'style' => 'width:250px')); ?> </div>
	<div class="row"><?php echo $form->hiddenField($model,'userID',array('value'=>$user)); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'isDeleted',array('value'=>'0')); ?></div>
	<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>

<?php $this->endWidget(); ?>

</div><!-- form -->