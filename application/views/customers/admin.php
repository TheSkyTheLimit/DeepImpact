<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Customers</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cusID',
		'screenName',
		'password',
		'firstName',
		'lastName', 'email',	'mobilePhone',


	array(  'name'=>'isActive',          'value'=>'$data->isActive==0?"No":"Yes"','filter'=>false,  ) ,	
		/*
		'email',
		'officePhone',
		'mobilePhone',
		'facebook',
		'instragram',
		'tweeter',
		'skype',
		'line',
		'preferredLang',
		'imei',
		'isActivated',
		'activatedDate',
		'isDeleted',
		'deviceID',
		'lastLogin',
		'deviceType',
		'avatar',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
