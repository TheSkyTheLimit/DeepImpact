<?php
/* @var $this PushNotificationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Push Notifications',
);

$this->menu=array(
	array('label'=>'Create PushNotification', 'url'=>array('create')),
	array('label'=>'Manage PushNotification', 'url'=>array('admin')),
);
?>

<h1>Push Notifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
