<?php
/* @var $this HistoryController */
/* @var $model History */


$this->menu = array(
    array('label' => 'List History', 'url' => array('index')),
    array('label' => 'Create History', 'url' => array('create')),
    array('label' => 'Update History', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete History', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage History', 'url' => array('admin')),
);

?>

<h1>View History #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'person_id',
        'dateconn',
        'talk',
        'report',
        'status',
        'ready',
        'schedule',
    ),
));

?>
<br />
<?php
echo CHtml::link('Back to To-Do list', array(
    'url' => $this->createUrl('history/admin', array('History[person_id]' => $model->person_id)))
);
