<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New Company', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#company-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Companies</h1>
<div style="text-align:right"><?php echo CHtml::link('New Company',array('company/create')); ?></div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'company-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'companyID', 'value'=>'$data->companyID','htmlOptions'=>array('style'=>'width:50px;text-align:center'),'filter'=>false,),
		array( 'name'=>'comName', 'value'=>'$data->comName','htmlOptions'=>array('style'=>'width:180px'),)	,
		array( 'name'=>'contactPerson', 'value'=>'$data->contactPerson','htmlOptions'=>array('style'=>'width:180px'),)	,
		'phoneNumber',
		'faxNumber',
	array( 'name'=>'createDate', 'value'=>'$data->createDate','htmlOptions'=>array('style'=>'width:120px'),'filter'=>false,) ,
		/*	'isActive',
		'logoIcon',
		'logoImage',
		'beginDate',
		'endDate',
		'isDeleted',
		'createUser',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
