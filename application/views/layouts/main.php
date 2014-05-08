<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
<?php
$user = Yii::app()->user->id;
$UserModel=Admin::model()->findByPk($user );
$menu = array(
			'items'=>array(
				array('label'=>'Push Notification', 'url'=>array('/pushNotification/admin')),
				array('label'=>'Media File', 'url'=>array('/productmedia/admin')),
				array('label'=>'Product', 'url'=>array('/products/admin')),
				array('label'=>'Product Group', 'url'=>array('/productgroup/admin')),
				array('label'=>'Category', 'url'=>array('/categories/admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/admin/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		);
if (!Yii::app()->user->isGuest){
	 if ($UserModel->userName =='admin'){
			$menu = array(
			'items'=>array(
				array('label'=>'Push Notification', 'url'=>array('/pushNotification/admin')),
				array('label'=>'Media File', 'url'=>array('/productmedia/admin')),
				array('label'=>'Product', 'url'=>array('/products/admin')),
				array('label'=>'Product Group', 'url'=>array('/productgroup/admin')),
				array('label'=>'Category', 'url'=>array('/categories/admin')),
				array('label'=>'Company', 'url'=>array('/company/admin')),
				array('label'=>'Customer', 'url'=>array('/customers/admin')),
				array('label'=>'User Configuration', 'url'=>array('/admin/admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/admin/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		);
	}
}
?>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',$menu); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by BGN Solutions.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
