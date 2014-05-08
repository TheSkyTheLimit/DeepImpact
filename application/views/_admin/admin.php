<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'New User', 'url'=>array('createUser')),
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

<h1>User Configuration</h1>
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
		'userID',
		'screenName',
		'userName',
		'userPassword',
		'firstName',
		'lastName',
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
