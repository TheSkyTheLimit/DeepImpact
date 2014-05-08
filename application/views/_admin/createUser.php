<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'New',
);

$this->menu=array(
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>New User</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>