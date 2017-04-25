<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $history History for this person */


$this->menu = array(
    array('label' => 'List Person', 'url' => array('index')),
    array('label' => 'Create Person', 'url' => array('create')),
    array('label' => 'Update Person', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Person', 'url' => '#', 'linkOptions' => array(
            'submit' => array(
                'delete', 'id' => $model->id
            ),
            'confirm' => 'Are you sure you want to delete this item?'
        )),
    array('label' => 'Manage Person', 'url' => array('admin')),
);

?>

<h1>Person: <?php echo ($model->fio == true) ? $model->fio : $model->whois; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(// related city displayed as a link
            'label' => 'Owner',
            'value' => $model->owner->login,
        ),
        array(
            'name' => 'fio',
            'visible' => ($model->fio == true) ? true : false,
        ),
        array(
            'name' => 'whois',
            'visible' => ($model->whois == true) ? true : false,
        ),
        array(
            'name' => 'organis',
            'visible' => ($model->organis == true) ? true : false,
        ),
        array(
            'name' => 'emails',
            'visible' => ($model->emails == true) ? true : false,
        ),
        array(
            'name' => 'telh',
            'visible' => ($model->telh == true) ? true : false,
        ),
        array(
            'name' => 'fax',
            'visible' => ($model->fax == true) ? true : false,
        ),
        array(
            'name' => 'mob2',
            'visible' => ($model->mob2 == true) ? true : false,
        ),
        array(
            'name' => 'mob1',
            'visible' => ($model->mob1 == true) ? true : false,
        ),
        array(
            'name' => 'addr',
            'visible' => ($model->addr == true) ? true : false,
        ),
        array(
            'name' => 'addrh',
            'visible' => ($model->addrh == true) ? true : false,
        ),
        array(
            'name' => 'addrw',
            'visible' => ($model->addrw == true) ? true : false,
        ),
        array(
            'name' => 'web',
            'visible' => ($model->web == true) ? true : false,
        ),
        array(
            'name' => 'birth',
            'visible' => ($model->birth == true) ? true : false,
        ),
        array(
            'name' => 'note',
            'type' => 'html',
            'visible' => ($model->note == true) ? true : false,
            'value' => CHtml::encode($model->note),
        ),
        array(
            'name' => 'foto',
            'visible' => ($model->foto == true) ? true : false,
        ),
        array(
            'name' => 'cat',
            'visible' => ($model->cat == true) ? true : false,
        ),
    ),
));

?>
<div class="row">
    History talk:
    envolve now!

</div>
