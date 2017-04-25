<?php
/* @var $this PocketController */
/* @var $model Pocket */
/* @var $form CActiveForm */

?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pocket-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));

    ?>

    <p class="note"><?php echo Yii::t('site', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('site', 'are required'); ?>.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'talkhistory_id'); ?>
        <?php echo $form->textField($model, 'talkhistory_id', array('size' => 19, 'maxlength' => 19)); ?>
        <?php echo $form->error($model, 'talkhistory_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'coin'); ?>
        <?php echo $form->textField($model, 'coin'); ?>
        <?php echo $form->error($model, 'coin'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site', 'Create') : Yii::t('site', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->