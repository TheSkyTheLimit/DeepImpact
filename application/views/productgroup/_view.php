<?php
/* @var $this ProductGroupController */
/* @var $data ProductGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('grpID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->grpID), array('view', 'id'=>$data->grpID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grpName')); ?>:</b>
	<?php echo CHtml::encode($data->grpName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grpIcon')); ?>:</b>
	<?php echo CHtml::encode($data->grpIcon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grpImage')); ?>:</b>
	<?php echo CHtml::encode($data->grpImage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catID')); ?>:</b>
	<?php echo CHtml::encode($data->catID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
	<?php echo CHtml::encode($data->isActive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	*/ ?>

</div>