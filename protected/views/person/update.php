<?php
/* @var $this PersonController */
/* @var $model Person */


$this->menu = array(
    array('label' => 'List Person', 'url' => array('index')),
    array('label' => 'Create Person', 'url' => array('create')),
    array('label' => 'View Person', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Person', 'url' => array('admin')),
);

?>

<h1><?php echo Yii::t('site', 'Update person') . '&nbsp;' . Yii::t('site', '#'); ?> <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>