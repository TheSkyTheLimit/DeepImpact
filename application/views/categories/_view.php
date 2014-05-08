<?php
/* @var $this CategoriesController */
/* @var $data Categories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('catID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->catID), array('view', 'id'=>$data->catID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catName')); ?>:</b>
	<?php echo CHtml::encode($data->catName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catIcon')); ?>:</b>
	<?php echo CHtml::encode($data->catIcon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catImage')); ?>:</b>
	<?php echo CHtml::encode($data->catImage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyID')); ?>:</b>
	<?php echo CHtml::encode($data->companyID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	*/ ?>

</div>