<?php
/* @var $this HistoryController */
/* @var $data History */

?>

<?php echo CHtml::link($data->id, $this->createUrl('history/admin', array('person_id' => $data->person_id))); ?>

<?php echo '&nbsp<b>' . CHtml::encode($data->contact->fio) . '</b>'; ?>

<?php echo CHtml::encode($data->dateconn); ?><br>

<?php echo CHtml::encode($data->talk); ?>

<?php echo '&nbsp;- ' . CHtml::encode($data->report); ?>

<?php echo CHtml::encode($data->getAttributeLabel('schedule')); ?>

<?php echo ' ' . CHtml::encode($data->schedule); ?>

<br>
