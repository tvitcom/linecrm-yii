<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */

?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'profile-form',
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
        <?php echo $form->labelEx($model, 'login'); ?>
        <?php echo $form->textField($model, 'login', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'login'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'passhash'); ?>
        <?php echo $form->textField($model, 'passhash', array('size' => 60, 'maxlength' => 64)); ?>
        <?php echo $form->error($model, 'passhash'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 25, 'maxlength' => 25)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'allow'); ?>
        <?php echo $form->textField($model, 'allow'); ?>
        <?php echo $form->error($model, 'allow'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tincoming'); ?>
        <?php echo $form->textField($model, 'tincoming'); ?>
        <?php echo $form->error($model, 'tincoming'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'developer'); ?>
        <?php echo $form->textField($model, 'developer'); ?>
        <?php echo $form->error($model, 'developer'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site', 'Create') : Yii::t('site', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->