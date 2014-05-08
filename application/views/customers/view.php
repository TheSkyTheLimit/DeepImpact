<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	$model->cusID,
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
	array('label'=>'Update Customers', 'url'=>array('update', 'id'=>$model->cusID)),
	array('label'=>'Delete Customers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cusID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customers', 'url'=>array('admin')),
);

$deviceType =  $model->deviceType==1?"Iphone":"Android";
$isActive = $model->isActive==0?"No":"Yes";
$isDeleted =  $model->isDeleted==0?"No":"Yes";
$isActivated =  $model->isActivated==0?"No":"Yes";
?>

<h1>View Customers #<?php echo $model->cusID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cusID',
		'screenName',
		'password',
		'firstName',
		'lastName',
		 array( 'name' =>'isActive','value'=>$isActive),
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
		array( 'name' =>'isActivated','value'=>$isActivated),
		'activatedDate',
		array( 'name' =>'isDeleted','value'=>$isDeleted),
		'deviceID',
		'lastLogin',
		array( 'name' =>'deviceType','value'=>$deviceType),
		'avatar',
	),
)); ?>
