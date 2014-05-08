<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('admin'),
	$model->companyID,
);

$this->menu=array(
	array('label'=>'Create Company', 'url'=>array('create')),
	array('label'=>'Update Company', 'url'=>array('update', 'id'=>$model->companyID)),
	array('label'=>'Delete Company', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->companyID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Company', 'url'=>array('admin')),
);
$user=Admin::model()->findByPk($model->createUser);
$IsActive = $model->isActive==0?"No":"Yes";
$IsDeleted = $model->isDeleted==0?"No":"Yes";
$Icon =$model->logoIcon==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/C".   substr("000000".$model->companyID, -6, 6)  ."/icon/" . $model->logoIcon;
$Image =$model->logoIcon==""? Yii::app()->baseUrl."/contents/no-image.png":Yii::app()->baseUrl."/contents/C".  substr("000000".$model->companyID, -6, 6)  ."/image/" . $model->logoIcon;
?>

<h1>View Company #<?php echo $model->companyID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'companyID',
		'comName',
	
		array( 'name' => 'logoIcon','value'=>CHtml::image($Icon,$model->comName,array("style" => "width:200px",)),'type'=>'raw','htmlOptions'=>array('style'=>'text-align:center'), 'filter'=>false,  ),
		array( 'name' => 'logoImage','value'=>CHtml::image($Image,$model->comName,array("style" => "width:200px",)),'type'=>'raw','htmlOptions'=>array('style'=>'text-align:center'), 'filter'=>false,  ),
		'taxID',
		'contactPerson',
		'phoneNumber',
		'faxNumber',
	
		'beginDate',
		'endDate',
 array( 'name' => 'isActive','value'=>$IsActive )	,
	'createDate',
		 array( 'name' => 'createUser','value'=>$user->userName),
	),
)); ?>
