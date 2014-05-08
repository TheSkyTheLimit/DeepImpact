<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Admin', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Admins</h1>
<div style="text-align:right"><?php echo CHtml::link('New user',array('admin/create')); ?></div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'userID', 'value'=>'$data->userID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),
		'screenName',
		'userName',
	
		'firstName',
		'lastName',
		
		array('name'=>'companyID', 'value'=>'Company::model()->findByPk($data->companyID)->comName', 'filter'=>CHtml::dropDownList('Admin[companyID]','companyID',CHtml::listData(Company::model()->findAll(),'companyID','comName'),array( 'empty' => '- N/A -','options'=>array('$data->comName'=>'selected'))),'htmlOptions'=>array('style'=>'width:185px'),) ,
			array( 'name'=>'userPassword', 'value'=>'$data->userPassword','htmlOptions'=>array('style'=>'width:185px;text-align:left'),'filter'=>false,),
		/*
		'privilegeLevel',
		'companyID',
		'isActive',
		'lastLogin',
		'avatar',
		'createDate',
		'email',
		'officePhone',
		'mobilePhone',
		'isAdmin',
		'isDeleted',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
