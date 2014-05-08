<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Category'=>array('admin'),
	$model->catID=>array('view','id'=>$model->catID),
	'Update',
);

$this->menu=array(
	array('label'=>'New Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->catID)),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->catID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>