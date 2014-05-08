<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->companyID), array('view', 'id'=>$data->companyID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comName')); ?>:</b>
	<?php echo CHtml::encode($data->comName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taxID')); ?>:</b>
	<?php echo CHtml::encode($data->taxID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactPerson')); ?>:</b>
	<?php echo CHtml::encode($data->contactPerson); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneNumber')); ?>:</b>
	<?php echo CHtml::encode($data->phoneNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faxNumber')); ?>:</b>
	<?php echo CHtml::encode($data->faxNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logoIcon')); ?>:</b>
	<?php echo CHtml::encode($data->logoIcon); ?>
	<br />

	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('logoImage')); ?>:</b>
	<?php echo CHtml::encode($data->logoImage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginDate')); ?>:</b>
	<?php echo CHtml::encode($data->beginDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
	<?php echo CHtml::encode($data->isActive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createUser')); ?>:</b>
	<?php echo CHtml::encode($data->createUser); ?>
	<br />
	 ?>

</div>