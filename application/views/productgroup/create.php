<?php
/* @var $this ProductGroupController */
/* @var $model ProductGroup */

$this->breadcrumbs=array(
	'Product Group'=>array('admin'),
	'New',
);

$this->menu=array(
	array('label'=>'Manage Product Group', 'url'=>array('admin')),
);
?>

<h1>New Product Group</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>