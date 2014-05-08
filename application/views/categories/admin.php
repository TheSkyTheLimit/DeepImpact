<?php
/* @var $this CategoriesController */
/* @var $model Categories */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$ddCompany = CHtml::listData(Company::model()->findAll($criteria), 'companyID', 'comName') ;
 }else{
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0 and companyID=:companyID';
	$criteria->params = array(':companyID'=>$UserModel->companyID);
	$ddCompany =  CHtml::listData(Company::model()->findAll($criteria), 'companyID', 'comName');
 }

$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>
<div style="text-align:right"><?php echo CHtml::link('New Category',array('categories/create')); ?></div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categories-grid',
	'dataProvider'=>$model->search($criteria),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'catID', 'value'=>'$data->catID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),	
		array('name'=>'catIcon', 'value'=>'$data->catIcon==""?CHtml::image(Yii::app()->baseUrl."/contents/no-image.png","$data->catName", array("style" => "width:100px",)):CHtml::image(Yii::app()->baseUrl."/contents/C".  substr("000000".$data->companyID, -6, 6)  ."/icon/" . $data->catIcon,"$data->catName", array("style" => "width:100px",))','type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		'catName',
		array('name'=>'companyID', 'value'=>'Company::model()->findByPk($data->companyID)->comName', 'filter'=>CHtml::dropDownList('Categories[companyID]','companyID',$ddCompany ,array( 'empty' => '- N/A -','options'=>array('$data->comName'=>'selected'))),'htmlOptions'=>array('style'=>'width:235px'),) ,
		array( 'name'=>'createDate', 'value'=>'$data->createDate','htmlOptions'=>array('style'=>'width:150px;text-align:left'),'filter'=>false,),	

		/*
		'userID',
			*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?> 
