<?php
/* @var $this PocketController */
/* @var $data Pocket */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('talkhistory_id')); ?>:</b>
	<?php echo CHtml::encode($data->talkhistory_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coin')); ?>:</b>
	<?php echo CHtml::encode($data->coin); ?>
	<br />


</div>