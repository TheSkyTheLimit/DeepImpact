<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'User'=>array('admin'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'New User', 'url'=>array('createUser')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->userID)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->userID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>