<?php
/* @var $this ProductMediaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Medias',
);

$this->menu=array(
	array('label'=>'Create ProductMedia', 'url'=>array('create')),
	array('label'=>'Manage ProductMedia', 'url'=>array('admin')),
);
?>

<h1>Product Medias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
