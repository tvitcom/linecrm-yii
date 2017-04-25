<?php
/* @var $this PocketController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pockets',
);

$this->menu=array(
	array('label'=>'Create Pocket', 'url'=>array('create')),
	array('label'=>'Manage Pocket', 'url'=>array('admin')),
);
?>

<h1>Pockets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
