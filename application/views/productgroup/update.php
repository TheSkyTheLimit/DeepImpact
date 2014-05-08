<?php
/* @var $this ProductGroupController */
/* @var $model ProductGroup */

$this->breadcrumbs=array(
	'Product Group'=>array('admin'),
	$model->grpID=>array('view','id'=>$model->grpID),
	'Update',
);

$this->menu=array(
	array('label'=>'New Product Group', 'url'=>array('create')),
	array('label'=>'View Product Group', 'url'=>array('view', 'id'=>$model->grpID)),
	array('label'=>'Manage Product Group', 'url'=>array('admin')),
);
?>

<h1>Update ProductGroup <?php echo $model->grpID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>