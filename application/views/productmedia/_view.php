<?php
/* @var $this ProductMediaController */
/* @var $data ProductMedia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mediaID), array('view', 'id'=>$data->mediaID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodID')); ?>:</b>
	<?php echo CHtml::encode($data->prodID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaURL')); ?>:</b>
	<?php echo CHtml::encode($data->mediaURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileSize')); ?>:</b>
	<?php echo CHtml::encode($data->fileSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortDesc')); ?>:</b>
	<?php echo CHtml::encode($data->shortDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longDesc')); ?>:</b>
	<?php echo CHtml::encode($data->longDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mediaType')); ?>:</b>
	<?php echo CHtml::encode($data->mediaType); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
	<?php echo CHtml::encode($data->isActive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	*/ ?>

</div>