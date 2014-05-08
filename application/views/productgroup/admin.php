<?php
/* @var $this ProductGroupController */
/* @var $model ProductGroup */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$ddCat = CHtml::listData(Categories::model()->findAll($criteria), 'catID', 'catName') ;
 }else{
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0 and companyID=:companyID';
	$criteria->params = array(':companyID'=>$UserModel->companyID);
	$ddCat =  CHtml::listData(Categories::model()->findAll($criteria), 'catID', 'catName');
 }
$this->breadcrumbs=array(
	'Product Group'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New Product Group', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Groups</h1>
<div style="text-align:right"><?php echo CHtml::link('New Group',array('productgroup/create')); ?></div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'grpID', 'value'=>'$data->grpID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),
		array('name'=>'grpIcon', 'value'=>'$data->grpIcon==""?CHtml::image(Yii::app()->baseUrl."/contents/no-image.png","$data->grpName", array("style" => "width:100px",)):CHtml::image(Yii::app()->baseUrl."/contents/".  $data->comHome ."/icon/" . $data->grpIcon,"$data->grpName", array("style" => "width:100px",))','type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		array( 'name'=>'grpName', 'value'=>'$data->grpName','htmlOptions'=>array('style'=>'width:250px'),)	,

	
		array('name'=>'catID', 'value'=>'Categories::model()->findByPk($data->catID)->catName', 'filter'=>CHtml::dropDownList('ProductGroup[catID]','catID',$ddCat,array( 'empty' => '- N/A -','options'=>array('$data->catID'=>'selected'))),'htmlOptions'=>array('style'=>'width:180px'),) ,
		array(  'name'=>'isActive', 'value'=>'$data->isActive!=1?"No":"Yes"','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,  ) ,	
		/*
		'isDeleted',
		'userID',
		'createDate',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:45px;text-align:center'),
		),
	),
)); ?>
