<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */

?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'history-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));

    ?>

    <p class="note"><?php echo Yii::t('site', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('site', 'are required'); ?>.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo CHtml::hiddenField('History[person_id]', $model->person_id, array('id' => 'person_id'));

    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'dateconn'); ?>
        <?php
        echo $form->textField($model, 'dateconn', array(
            'class' => 'date-picker',
            'value' => ($model->dateconn === '') ? date('Y-m-d') : $model->dateconn,
        ));

        ?>
        <?php echo $form->error($model, 'dateconn'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'talk'); ?>
        <?php echo $form->textArea($model, 'talk', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'talk'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'schedule'); ?>
        <?php
        echo $form->textField($model, 'schedule', array(
            'class' => 'date-picker'
        ));

        ?>
        <?php echo $form->error($model, 'schedule'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'report'); ?>
        <?php echo $form->textArea($model, 'report', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'report'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php
        echo $form->textField($model, 'status', array('value' => 1,
            'disabled' => 'on'));

        ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ready'); ?>
        <?php echo $form->checkBox($model, 'ready', array('size' => 1, 'maxlength' => 1)); ?>
        <?php echo $form->error($model, 'ready'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site', 'Create') : Yii::t('site', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
