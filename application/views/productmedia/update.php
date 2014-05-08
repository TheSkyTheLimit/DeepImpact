<?php
/* @var $this ProductMediaController */
/* @var $model ProductMedia */

$this->breadcrumbs=array(
	'Media File'=>array('admin'),
	$model->mediaID=>array('view','id'=>$model->mediaID),
	'Update',
);

$this->menu=array(
	array('label'=>'New Media File', 'url'=>array('create')),
	array('label'=>'View Media File', 'url'=>array('view', 'id'=>$model->mediaID)),
	array('label'=>'Manage Media File', 'url'=>array('admin')),
);
?>

<h1>Update Product Media File <?php echo $model->mediaID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>