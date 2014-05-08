<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('admin'),
	$model->userID,
);

$this->menu=array(
	array('label'=>'Create Admin', 'url'=>array('createUser')),
	array('label'=>'Update Admin', 'url'=>array('update', 'id'=>$model->userID)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
$isActive = $model->isActive==0?"No":"Yes";
$isAdmin = $model->isAdmin==0?"No":"Yes"; 
$company=Company::model()->findByPk($model->companyID);
?>

<h1>View User #<?php echo $model->userID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userID',
		'screenName',
		'userName',
		'userPassword',
		'firstName',
		'lastName',
		'privilegeLevel',
		 array( 'name' => 'companyID','value'=>$company->comName),
		array( 'name' =>'isActive','value'=>$isActive),
	//*	'avatar',
		'createDate',
		'email',
		'officePhone',
		'mobilePhone',
		array( 'name' =>'isActive','value'=>$isAdmin),
		'lastLogin',
	),
)); ?>
