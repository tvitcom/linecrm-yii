<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs = array(
    'Profiles' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Profile', 'url' => array('index')),
    array('label' => 'Create Profile', 'url' => array('create')),
);

?>

<h1><?php echo Yii::t('site', 'Manage profiles'); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'profile-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'login',
        'email',
        'allow',
        'tincoming',
        'developer',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));

?>
