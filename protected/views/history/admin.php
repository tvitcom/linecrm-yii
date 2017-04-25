<?php
/* @var $this HistoryController */
/* @var $person the Person joined to his history table */
/* @var $history History model  */

$this->menu = array(
    array(
        'label' => 'Edit contact',
        'url' => array('person/update', 'id' => $person->id),
    ),
    array(
        'label' => 'Create History',
        'url' => '#',
        'linkOptions' => array('submit' => array('create', 'person_id' => $person->id))),
);

Yii::app()->clientScript->registerScript('contact', "
$('.show-info').click(function(){
	$('.contact-info').toggle();
	return true;
});
");

?>


<h1><?php echo $person->fio; ?> (<?php echo $person->whois; ?>):</h1>


<?php echo CHtml::link(Yii::t('site', 'Show contact fields'), '#', array('class' => 'show-info')); ?>
&nbsp;<?php echo Yii::t('site', 'or'); ?> <?php echo CHtml::link(Yii::t('site', 'edit contact'), array('person/update', 'id' => $person->id)); ?>

<div class="contact-info" style="display:none">
    <?php
    if ($person == true) {
        echo '<br>';
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $person,
            'attributes' => array(
                'id',
                array(// related city displayed as a link
                    'label' => 'Owner',
                    'value' => $person->owner->login,
                ),
                array(
                    'name' => 'fio',
                    'visible' => ($person->fio == true) ? true : false,
                ),
                array(
                    'name' => 'whois',
                    'visible' => ($person->whois == true) ? true : false,
                ),
                array(
                    'name' => 'organis',
                    'visible' => ($person->organis == true) ? true : false,
                ),
                array(
                    'name' => 'emails',
                    'visible' => ($person->emails == true) ? true : false,
                ),
                array(
                    'name' => 'telh',
                    'visible' => ($person->telh == true) ? true : false,
                ),
                array(
                    'name' => 'fax',
                    'visible' => ($person->fax == true) ? true : false,
                ),
                array(
                    'name' => 'mob2',
                    'visible' => ($person->mob2 == true) ? true : false,
                ),
                array(
                    'name' => 'mob1',
                    'visible' => ($person->mob1 == true) ? true : false,
                ),
                array(
                    'name' => 'addr',
                    'visible' => ($person->addr == true) ? true : false,
                ),
                array(
                    'name' => 'addrh',
                    'visible' => ($person->addrh == true) ? true : false,
                ),
                array(
                    'name' => 'addrw',
                    'visible' => ($person->addrw == true) ? true : false,
                ),
                array(
                    'name' => 'web',
                    'visible' => ($person->web == true) ? true : false,
                ),
                array(
                    'name' => 'birth',
                    'visible' => ($person->birth == true) ? true : false,
                ),
                array(
                    'name' => 'note',
                    'visible' => ($person->note == true) ? true : false,
                ),
                array(
                    'name' => 'foto',
                    'visible' => ($person->foto == true) ? true : false,
                ),
                array(
                    'name' => 'cat',
                    'visible' => ($person->cat == true) ? true : false,
                ),
            ),
        ));
    }

    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'history-grid',
    'dataProvider' => $history->search(),
    'columns' => array(
        'id',
        'person_id',
        'dateconn',
        'talk',
        'report',
        'status',
        'ready',
        'schedule',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));

?>

