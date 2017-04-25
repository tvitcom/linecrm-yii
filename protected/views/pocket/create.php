<?php
/* @var $this PocketController */
/* @var $model Pocket */

$this->breadcrumbs=array(
	'Pockets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pocket', 'url'=>array('index')),
	array('label'=>'Manage Pocket', 'url'=>array('admin')),
);
?>

<h1>Create Pocket</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>