<?php
/* @var $this PushNotificationController */
/* @var $model PushNotification */

$this->breadcrumbs=array(
	'Push Notifications'=>array('index'),
	$model->pushID=>array('view','id'=>$model->pushID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PushNotification', 'url'=>array('index')),
	array('label'=>'Create PushNotification', 'url'=>array('create')),
	array('label'=>'View PushNotification', 'url'=>array('view', 'id'=>$model->pushID)),
	array('label'=>'Manage PushNotification', 'url'=>array('admin')),
);
?>

<h1>Update PushNotification <?php echo $model->pushID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>