<?php
/* @var $this ProductMediaController */
/* @var $model ProductMedia */

$this->breadcrumbs=array(
	'Media File'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Media File', 'url'=>array('admin')),
);
?>

<h1>New Media File</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>