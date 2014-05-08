<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->prodID), array('view', 'id'=>$data->prodID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grpID')); ?>:</b>
	<?php echo CHtml::encode($data->grpID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodName')); ?>:</b>
	<?php echo CHtml::encode($data->prodName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodLongName')); ?>:</b>
	<?php echo CHtml::encode($data->prodLongName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodShortDesc')); ?>:</b>
	<?php echo CHtml::encode($data->prodShortDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodDesc')); ?>:</b>
	<?php echo CHtml::encode($data->prodDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating')); ?>:</b>
	<?php echo CHtml::encode($data->rating); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('prodIcon')); ?>:</b>
	<?php echo CHtml::encode($data->prodIcon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qrData')); ?>:</b>
	<?php echo CHtml::encode($data->qrData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
	<?php echo CHtml::encode($data->isActive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maker')); ?>:</b>
	<?php echo CHtml::encode($data->maker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	*/ ?>

</div>