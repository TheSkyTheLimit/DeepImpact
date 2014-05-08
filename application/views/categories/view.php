<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Category'=>array('admin'),
	$model->catID,
);

$this->menu=array(
	array('label'=>'New Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->catID)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->catID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
$user=Admin::model()->findByPk($model->userID);
$company=Company::model()->findByPk($model->companyID);
$IsDeleted = $model->isDeleted==0?"No":"Yes";
$Icon =$model->catIcon==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/C".  substr("000000".$model->companyID, -6, 6). "/icon/" . $model->catIcon;
$Image =$model->catImage==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/C".  substr("000000".$model->companyID, -6, 6) ."/image/" . $model->catImage;
?>

<h1>View Category #<?php echo $model->catID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'catID',
		'catName',
	
		array( 'name' => 'catIcon','value'=>CHtml::image($Icon,$model->catName,array("style" => "width:200px",)),'type'=>'raw','htmlOptions'=>array('style'=>'text-align:center'), 'filter'=>false,  ),
		array( 'name' => 'catImage','value'=>CHtml::image($Image,$model->catName,array("style" => "width:200px",)),'type'=>'raw','htmlOptions'=>array('style'=>'text-align:center'), 'filter'=>false,  ),
		 array( 'name' => 'companyID','value'=>$company->comName),
 array( 'name' => 'userID','value'=>$user->userName),
		'createDate',
	),
)); ?>
