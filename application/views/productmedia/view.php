<?php
/* @var $this ProductMediaController */
/* @var $model ProductMedia */

$this->breadcrumbs=array(
	'Product Medias'=>array('index'),
	$model->mediaID,
);

$this->menu=array(
	array('label'=>'Create ProductMedia', 'url'=>array('create')),
	array('label'=>'Update ProductMedia', 'url'=>array('update', 'id'=>$model->mediaID)),
	array('label'=>'Delete ProductMedia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mediaID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductMedia', 'url'=>array('admin')),
);
$user=Admin::model()->findByPk($model->createdBy);
$Product=Products::model()->findByPk($model->prodID);
$isActive = $model->isActive==0?"No":"Yes";
$mtype= array('1'=>'Image', '2'=>'Audio','3'=>'Video');
?>

<h1>View ProductMedia #<?php echo $model->mediaID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mediaID',
	 array( 'name' => 'prodID','value'=>$Product->prodName)	,
		'mediaURL',
		'shortDesc',
		'longDesc',
	array( 'name' => 'mediaType','value'=>$mtype[$model->mediaType])	,
		 array( 'name' =>'isActive','value'=>$isActive),
	 array( 'name' => 'createdBy','value'=>$user->userName)	,
		'createDate',
	),
)); ?>
