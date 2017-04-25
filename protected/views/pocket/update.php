<?php
/* @var $this PocketController */
/* @var $model Pocket */

$this->breadcrumbs=array(
	'Pockets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pocket', 'url'=>array('index')),
	array('label'=>'Create Pocket', 'url'=>array('create')),
	array('label'=>'View Pocket', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pocket', 'url'=>array('admin')),
);
?>

<h1>Update Pocket <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>