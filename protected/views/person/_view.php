<?php
/* @var $this PersonController */
/* @var $data Person */

?>
<?php echo '&nbsp' . CHtml::link($data->id, $this->createUrl('history/admin', array('person_id' => $data->id))); ?>
<?php echo '&nbsp' . CHtml::encode($data->fio); ?>
<?php echo '&nbsp' . '(' . CHtml::encode($data->whois) . ')'; ?>
<?php echo '&nbsp' . CHtml::encode($data->telh); ?>
<?php echo '&nbsp' . CHtml::encode($data->fax); ?>
<?php echo '&nbsp' . CHtml::encode($data->mob2); ?>
<?php echo '&nbsp' . CHtml::encode($data->mob1); ?>
<br>


