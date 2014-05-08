<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Product'=>array('admin'),
	'New',
);

$this->menu=array(
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>New Product</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>