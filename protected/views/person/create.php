<?php
/* @var $this PersonController */
/* @var $model Person */



$this->menu = array(
    array('label' => 'List Person', 'url' => array('index')),
    array('label' => 'Manage Person', 'url' => array('admin')),
);

?>

<h1>Create Person</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>