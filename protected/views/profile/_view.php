<?php
/* @var $this ProfileController */
/* @var $data Profile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passhash')); ?>:</b>
	<?php echo CHtml::encode($data->passhash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allow')); ?>:</b>
	<?php echo CHtml::encode($data->allow); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tincoming')); ?>:</b>
	<?php echo CHtml::encode($data->tincoming); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('developer')); ?>:</b>
	<?php echo CHtml::encode($data->developer); ?>
	<br />


</div>