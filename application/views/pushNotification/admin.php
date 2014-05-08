<?php
/* @var $this PushNotificationController */
/* @var $model PushNotification */
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
$this->breadcrumbs=array(
	'Push Notifications'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New PushNotification', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#push-notification-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Push Notifications</h1>

<div style="text-align:right"><?php echo CHtml::link('New Notifications',array('pushNotification/create')); ?></div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'push-notification-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'pushID', 'value'=>'$data->pushID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),
	
		array('name'=>'companyID', 'value'=>'Company::model()->findByPk($data->companyID)->comName', 'filter'=>CHtml::dropDownList('PushNotification[companyID]','companyID',$ddCompany,array( 'empty' => '- N/A -','options'=>array('$data->companyID'=>' selected'))),'htmlOptions'=>array('style'=>'width:180px'),) ,
		array( 'name' => 'startDate',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', 
                                array(
                                        'model' => $model,
                                        'attribute' => 'startDate',
                                        'language' => 'en',
                                        'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
                                        'htmlOptions' => array(
                                         'id' => 'startDate',
                                         'dateFormat' => 'yy-mm-dd',
                                        ),
                                        'options' => array(  // (#3)
                  'showOn' => 'focus', 
                  'dateFormat' => 'yy-mm-dd',
                  'showOtherMonths' => true,
                  'selectOtherMonths' => true,
                  'changeMonth' => true,
                  'changeYear' => true,
                  'showButtonPanel' => true,
		 ) ),   true),  ),
		 	'pushURL',
		'pushData',
		/*
		'isDeleted',
		'userCreated',
		'createdDate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
