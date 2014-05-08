<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	'New Category',
);

$this->menu=array(
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>New Category</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>