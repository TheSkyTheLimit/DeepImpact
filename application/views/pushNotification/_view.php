<?php
/* @var $this PushNotificationController */
/* @var $data PushNotification */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pushID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pushID), array('view', 'id'=>$data->pushID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyID')); ?>:</b>
	<?php echo CHtml::encode($data->companyID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startDate')); ?>:</b>
	<?php echo CHtml::encode($data->startDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pushURL')); ?>:</b>
	<?php echo CHtml::encode($data->pushURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pushData')); ?>:</b>
	<?php echo CHtml::encode($data->pushData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('userCreated')); ?>:</b>
	<?php echo CHtml::encode($data->userCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdDate')); ?>:</b>
	<?php echo CHtml::encode($data->createdDate); ?>
	<br />

	*/ ?>

</div>