<?php
/* @var $this PocketController */
/* @var $model Pocket */

$this->breadcrumbs=array(
	'Pockets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pocket', 'url'=>array('index')),
	array('label'=>'Create Pocket', 'url'=>array('create')),
	array('label'=>'Update Pocket', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pocket', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pocket', 'url'=>array('admin')),
);
?>

<h1>View Pocket #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'talkhistory_id',
		'coin',
	),
)); ?>
