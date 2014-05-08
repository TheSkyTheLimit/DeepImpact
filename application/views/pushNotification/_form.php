<?php
/* @var $this PushNotificationController */
/* @var $model PushNotification */
/* @var $form CActiveForm */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$ddCompany = CHtml::listData(Company::model()->findAll($criteria), 'companyID', 'comName') ;
 }else{
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0 and companyID=:companyID';
	$criteria->params = array(':companyID'=>$UserModel->companyID);
	$ddCompany =  CHtml::listData(Company::model()->findAll($criteria), 'companyID', 'comName');
 }
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'push-notification-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'companyID'); ?>
		<?php echo $form->dropDownList($model,'companyID', $ddCompany ,array( 'empty' => '- Select company -',    'style' => 'width:250px')); ?> 
		<?php echo $form->error($model,'companyID'); ?>
	</div>
		<div class="row"><?php echo $form->labelEx($model,'startDate'); ?>
    <?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'startDate',
	'attribute'=>'startDate',
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
      <?php echo $form->error($model,'startDate'); ?>
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
	<div class="row">
		<?php echo $form->labelEx($model,'pushURL'); ?>
		<?php echo $form->textArea($model,'pushURL',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pushURL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pushData'); ?>
		<?php echo $form->textArea($model,'pushData',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pushData'); ?>
	</div>
	<div class="row"><?php echo $form->hiddenField($model,'isDeleted',array('value'=>'0')); ?></div>
	<div class="row"><?php echo $form->hiddenField($model,'userCreated',array('value'=>$user)); ?></div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->