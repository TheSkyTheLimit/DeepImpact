<?php
/* @var $this PushNotificationController */
/* @var $model PushNotification */

$this->breadcrumbs=array(
	'Push Notifications'=>array('admin'),
	$model->pushID,
);

$user=Admin::model()->findByPk($model->userCreated);
$Company=Company::model()->findByPk($model->companyID);

$this->menu=array(
	array('label'=>'List PushNotification', 'url'=>array('index')),
	array('label'=>'Create PushNotification', 'url'=>array('create')),
	array('label'=>'Update PushNotification', 'url'=>array('update', 'id'=>$model->pushID)),
	array('label'=>'Delete PushNotification', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pushID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PushNotification', 'url'=>array('admin')),
);
?>

<h1>View PushNotification #<?php echo $model->pushID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pushID',
		array( 'name' => 'companyID','value'=>$Company->comName)	,
		'startDate',
		'endDate',
		'pushURL',
		'pushData',	array( 'name' => 'userCreated','value'=>$user->userName)	,
		'createdDate',
	),
)); ?>
<?php echo CHtml::button('Send', array('submit' => array('/gcm/pushMsg.php'))); ?>
