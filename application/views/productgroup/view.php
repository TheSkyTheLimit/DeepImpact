<?php
/* @var $this ProductGroupController */
/* @var $model ProductGroup */

$this->breadcrumbs=array(
	'Product Group'=>array('admin'),
	$model->grpID,
);

$this->menu=array(
	array('label'=>'New Product Group', 'url'=>array('create')),
	array('label'=>'Update Product Group', 'url'=>array('update', 'id'=>$model->grpID)),
	array('label'=>'Delete Product Group', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->grpID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product Group', 'url'=>array('admin')),
);

$user=Admin::model()->findByPk($model->userID);
$Categories=Categories::model()->findByPk($model->catID);
$isActive = $model->isActive==0?"No":"Yes";
$Icon =$model->grpIcon==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/".  $model->comHome ."/icon/" . $model->grpIcon;
$Image =$model->grpImage==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/".  $model->comHome ."/image/" . $model->grpImage;
?>

<h1>View Product Group #<?php echo $model->grpID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'grpID',
		'grpName',
		
		array( 'name' => 'grpIcon','value'=>CHtml::image($Icon,$model->grpName,array("style" => "width:200px",)),'type'=>'raw','htmlOptions'=>array('style'=>'text-align:center'), 'filter'=>false,  ),
		array( 'name' => 'grpImage','value'=>CHtml::image($Image,$model->grpName,array("style" => "width:200px",)),'type'=>'raw','htmlOptions'=>array('style'=>'text-align:center'), 'filter'=>false,  ),
		array( 'name' => 'catID','value'=>$Categories->catName)	,
		 array( 'name' =>'isActive','value'=>$isActive)	,
 array( 'name' => 'userID','value'=>$user->userName),
		'createDate',
	),
)); ?>
