<?php
/* @var $this ProductsController */
/* @var $model Products */
$user=Admin::model()->findByPk($model->createdBy);
$ProductGroup=ProductGroup::model()->findByPk($model->grpID);
$isActive = $model->isActive==0?"No":"Yes";
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
		'rating',
	
		array( 'name' => 'prodIcon','value'=>CHtml::image($Icon,$model->prodName,array("style" => "width:150px",)),'type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		array( 'name' =>'isActive','value'=>$isActive),
			'maker',
		'model',
		'createDate',
	),
)); ?>
