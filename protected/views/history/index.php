<?php
/* @var $this HistoryController */
/* @var $dataProvider CActiveDataProvider */


$this->menu = array(
    array('label' => Yii::t('site', 'Contacts'), 'url' => array('person/index')),
    );

?>

<h1><?php echo Yii::t('site', 'To do now'); ?>:</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'sortableAttributes' => array('schedule'),
));

?>
