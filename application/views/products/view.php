<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Product'=>array('admin'),
	$model->prodID,
);

$this->menu=array(
	array('label'=>'New Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->prodID)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prodID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);

$user=Admin::model()->findByPk($model->createdBy);
$ProductGroup=ProductGroup::model()->findByPk($model->grpID);
$isActive = $model->isActive!=1?"No":"Yes";
//$Icon = $model->prodIcon==""?Yii::app()->baseUrl."/contents/no-image.png",model->prodName, array("style" => "width:100px",):Yii::app()->baseUrl."/contents/".  $model->comHome ."/icon/" . $model->prodIcon,$model->prodName, array("style" => "width:100px",);
$Icon =$model->prodIcon==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/".  $model->comHome ."/icon/" . $model->prodIcon;
?>

<h1>View Product #<?php echo $model->prodID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prodID', 	 array( 'name' => 'grpID','value'=>$ProductGroup->grpName)	,
		'prodName',
		'prodLongName',
		'prodShortDesc',
		'prodDesc',
'qrData',		'rating',
	
		array( 'name' => 'prodIcon','value'=>CHtml::image($Icon,$model->prodName,array("style" => "width:150px",)),'type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		array( 'name' =>'isActive','value'=>$isActive),
	'maker',
		'model',
 array( 'name' => 'qrData','value'=>CHtml::image("https://chart.googleapis.com/chart?chs=100x100&cht=qr&chld=H|1&chl=http%3A%2F%2Fmobile.bgnsolutions.com%2Findex.php%3Fr%3Dproduct%2Fview%26id%3D".$model->prodID),'type'=>'raw'), array( 'name' => 'createdBy','value'=>$user->userName)	,
		'createDate',
	),
)); ?>
