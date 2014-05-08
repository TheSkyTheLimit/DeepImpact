<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Product'=>array('admin'),
	$model->prodID=>array('view','id'=>$model->prodID),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'View Product', 'url'=>array('view', 'id'=>$model->prodID)),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Update Product <?php echo $model->prodID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>