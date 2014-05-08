<?php
/* @var $this ProductsController */
/* @var $model Products */
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
 if ($UserModel->isAdmin ==1){
	$criteria = new CDbCriteria();
	$criteria->condition = 'isDeleted=0';
	$criteria->order = "grpName";
	$ddGroup = CHtml::listData(ProductGroup::model()->findAll($criteria), 'grpID', 'grpName') ;
 }else{
	$criteria = new CDbCriteria();
	$criteria->join=('INNER JOIN categories on t.catID=categories.catID ');
	$criteria->condition = ' t.isDeleted=0 and categories.isDeleted=0 and categories.companyID=:companyID';
	$criteria->order = "grpName";
	$criteria->params = array(':companyID'=>$UserModel->companyID);
	$ddGroup =  CHtml::listData(ProductGroup::model()->findAll($criteria), 'grpID', 'grpName');
 }
$this->breadcrumbs=array(
	'Product'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New Product', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Products</h1>
<div style="text-align:right"><?php echo CHtml::link('New Product',array('products/create')); ?></div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?></div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'prodID', 'value'=>'$data->prodID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),
		array( 'name'=>'qrData', 'value'=>'CHtml::image("https://chart.googleapis.com/chart?chs=100x100&cht=qr&chld=H|1&chl=http%3A%2F%2Fmobile.bgnsolutions.com%2Findex.php%3Fr%3Dproduct%2Fview%26id%3D".$data->prodID,"$data->prodName", array("style" => "width:100px",))','type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		array('name'=>'prodIcon', 'value'=>'$data->prodIcon==""?CHtml::image(Yii::app()->baseUrl."/contents/no-image.png","$data->prodName", array("style" => "width:100px",)):CHtml::image(Yii::app()->baseUrl."/contents/".  $data->comHome ."/icon/" . $data->prodIcon,"$data->prodName", array("style" => "width:100px",))','type'=>'raw','htmlOptions'=>array('style'=>'width:105px;text-align:center'), 'filter'=>false,  ),
		array( 'name'=>'prodName', 'value'=>'$data->prodName',),
		
		array('name'=>'grpID', 'value'=>'ProductGroup::model()->findByPk($data->grpID)->grpName', 'filter'=>CHtml::dropDownList('Products[grpID]','grpID',$ddGroup,array( 'empty' => '- N/A -','options'=>array('$data->grpID'=>'selected'))),'htmlOptions'=>array('style'=>'width:180px'),) ,

		array( 'name'=>'maker', 'value'=>'$data->maker','htmlOptions'=>array('style'=>'width:100px'), 'filter'=>false,),
		array( 'name'=>'model', 'value'=>'$data->model','htmlOptions'=>array('style'=>'width:100px'), 'filter'=>false,),
		array(  'name'=>'isActive',          'value'=>'$data->isActive!=1?"No":"Yes"','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,  ) ,	
      	/*	'prodLongName',		'prodShortDesc',
	'prodDesc',		'rating',
		'prodIcon',
		'qrData',
	
		'isDeleted',
		'maker',
		'model',
		'createdBy',
		'createDate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
//CHtml::image(Yii::app()->baseUrl."/contents/".  $data->comHome ."/icon/" . $data->prodIcon,"$data->prodName", array("style" => "width:100px",))
/*
array(
                array(
                    'header'=>'Active',
                    'name'=>'active',
                    'value'=>'Contents::model()->getActiveStateName($data->active)',
                    'filter'=>CHtml::dropDownList('Contents[active]','',CHtml::listData(Contents::model()->getActiveStatesArray(), 'value', 'name'),array('options'=>array('$data->active'=>'selected'))),
					'filter'=>CHtml::dropDownList('ProductGroup[grpID]','',CHtml::listData(ProductGroup::model()->findAll(), 'grpID', 'grpName'),array('options'=>array('$data->active'=>'selected'))),
             $ddGroup = CHtml::listData(ProductGroup::model()->findAll(array('order' => 'grpName')), 'grpID', 'grpName'),array('options'=>array('$data->grpID'=>'selected'));      
			 */
?>
