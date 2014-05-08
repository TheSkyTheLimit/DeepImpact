<?php
/* @var $this ProductMediaController */
/* @var $model ProductMedia */

$this->breadcrumbs=array(
	'Media File'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New Media File', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-media-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Media File</h1>
<div style="text-align:right"><?php echo CHtml::link('New Media',array('productmedia/create')); ?></div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	 $criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$criteria->order = 'prodName ';
	$ddProducts = Products::model()->findAll($criteria);
 }else{
	 $sql = 'Select prodID,prodName from products Where EXISTS (Select * from product_group  INNER JOIN categories  on categories.catID=product_group.catID INNER JOIN admin on categories.companyID=admin.companyID  Where admin.companyID='.$UserModel->companyID.' and product_group.isDeleted=0 and categories.isDeleted=0) and products.isDeleted=0     order by prodName ';
	$ddProducts = Yii::app()->db->createCommand($sql)->queryAll();
	//$ddProducts = CHtml::listData($UserGrp, 'prodID', 'prodName');
	//echo $sql;
 }
?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-media-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'mediaID', 'value'=>'$data->mediaID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),
		array('name'=>'mediaType', 'value'=>'$data->mediaType=="0"?CHtml::image(Yii::app()->baseUrl."/contents/no-image.png","$data->grpName", array("style" => "width:100px",)):CHtml::image(Yii::app()->baseUrl."/contents/mediatype$data->mediaType.png","$data->mediaType", array("style" => "width:65px",))','type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		array( 'name'=>'mediaURL', 'value'=>'$data->mediaURL','htmlOptions'=>array('style'=>'width:250px'),)	,
		array('name'=>'prodID', 'value'=>'Products::model()->findByPk($data->prodID)->prodName', 'filter'=>CHtml::dropDownList('ProductMedia[prodID]','prodID',CHtml::listData($ddProducts,'prodID','prodName'),array( 'empty' => '- N/A -','options'=>array('$data->prodID'=>'selected'))),'htmlOptions'=>array('style'=>'width:180px'),) ,
//		array('name'=>'prodID' ,  'value'=>'Products::model()->findByPk($data->prodID)->prodName', 'filter'=>false, ),
		
		array( 'name'=>'shortDesc', 'value'=>'$data->shortDesc','filter'=>false,)	,
	
		/*longDesc,
		'mediaType',
		'isActive',
		'isDeleted',
		'createdBy',
		'createDate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
