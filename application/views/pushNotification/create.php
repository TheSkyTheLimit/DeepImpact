<?php
/* @var $this PushNotificationController */
/* @var $model PushNotification */

$this->breadcrumbs=array(
	'Push Notifications'=>array('admin'),
	'New',
);

$this->menu=array(
	array('label'=>'List PushNotification', 'url'=>array('index')),
	array('label'=>'Manage PushNotification', 'url'=>array('admin')),
);
?>

<h1>Create PushNotification</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>