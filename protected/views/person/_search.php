<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */

?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));

    ?>



    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size' => 19, 'maxlength' => 19)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'whose_id'); ?>
        <?php echo $form->textField($model, 'whose_id', array('size' => 21, 'maxlength' => 21)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fio'); ?>
        <?php echo $form->textField($model, 'fio', array('size' => 60, 'maxlength' => 62)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'whois'); ?>
        <?php echo $form->textField($model, 'whois', array('size' => 60, 'maxlength' => 80)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'organis'); ?>
        <?php echo $form->textField($model, 'organis', array('size' => 60, 'maxlength' => 93)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'emails'); ?>
        <?php echo $form->textField($model, 'emails', array('size' => 57, 'maxlength' => 57)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'telh'); ?>
        <?php echo $form->textField($model, 'telh', array('size' => 16, 'maxlength' => 16)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fax'); ?>
        <?php echo $form->textField($model, 'fax', array('size' => 16, 'maxlength' => 16)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'mob2'); ?>
        <?php echo $form->textField($model, 'mob2', array('size' => 16, 'maxlength' => 16)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'mob1'); ?>
        <?php echo $form->textField($model, 'mob1', array('size' => 16, 'maxlength' => 16)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'addr'); ?>
        <?php echo $form->textField($model, 'addr', array('size' => 60, 'maxlength' => 148)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'addrh'); ?>
        <?php echo $form->textField($model, 'addrh', array('size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'addrw'); ?>
        <?php echo $form->textField($model, 'addrw', array('size' => 60, 'maxlength' => 80)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'web'); ?>
        <?php echo $form->textField($model, 'web', array('size' => 43, 'maxlength' => 43)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'birth'); ?>
        <?php echo $form->textField($model, 'birth', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'note'); ?>
        <?php echo $form->textField($model, 'note', array('size' => 60, 'maxlength' => 4000)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'foto'); ?>
        <?php echo $form->textField($model, 'foto', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'cat'); ?>
        <?php echo $form->textField($model, 'cat', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->