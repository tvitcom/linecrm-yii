<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */

?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'person-form',
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
        <?php echo $form->labelEx($model, 'fio'); ?>
        <?php echo $form->textField($model, 'fio', array('size' => 60, 'maxlength' => 62)); ?>
        <?php echo $form->error($model, 'fio'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'whois'); ?>
        <?php echo $form->textField($model, 'whois', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'whois'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'organis'); ?>
        <?php echo $form->textField($model, 'organis', array('size' => 60, 'maxlength' => 93)); ?>
        <?php echo $form->error($model, 'organis'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'emails'); ?>
        <?php echo $form->textField($model, 'emails', array('size' => 57, 'maxlength' => 57)); ?>
        <?php echo $form->error($model, 'emails'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'telh'); ?>
        <?php echo $form->textField($model, 'telh', array('size' => 16, 'maxlength' => 16)); ?>
        <?php echo $form->error($model, 'telh'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fax'); ?>
        <?php echo $form->textField($model, 'fax', array('size' => 16, 'maxlength' => 16)); ?>
        <?php echo $form->error($model, 'fax'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mob2'); ?>
        <?php echo $form->textField($model, 'mob2', array('size' => 16, 'maxlength' => 16)); ?>
        <?php echo $form->error($model, 'mob2'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mob1'); ?>
        <?php echo $form->textField($model, 'mob1', array('size' => 16, 'maxlength' => 16)); ?>
        <?php echo $form->error($model, 'mob1'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'addr'); ?>
        <?php echo $form->textField($model, 'addr', array('size' => 60, 'maxlength' => 148)); ?>
        <?php echo $form->error($model, 'addr'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'addrh'); ?>
        <?php echo $form->textField($model, 'addrh', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'addrh'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'addrw'); ?>
        <?php echo $form->textField($model, 'addrw', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'addrw'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'web'); ?>
        <?php echo $form->textField($model, 'web', array('size' => 43, 'maxlength' => 43)); ?>
        <?php echo $form->error($model, 'web'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birth'); ?>
        <?php
        echo $form->DateField($model, 'birth', array(
            'class' => 'date-picker',
        ));

        ?>
        <?php echo $form->error($model, 'birth'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'note'); ?>
        <?php
        $this->widget('application.extensions.markitup.EMarkitupWidget', array(
            'model' => $model,
            'attribute' => 'note',
            'settings' => 'markdown',
            'options' => array(
                'previewParserPath' =>
                Yii::app()->urlManager->createUrl('/person/mdpreview')
            ),
        ));

        ?>
        <?php /*
          echo $form->textArea($model, 'note', array('id' => 'idTextField',
          'rows' => 10,
          'cols' => 70));
         */

        ?>
        <?php echo $form->error($model, 'note'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'foto'); ?>
        <?php echo $form->textField($model, 'foto', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'foto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cat'); ?>
        <?php echo $form->textField($model, 'cat', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'cat'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('site', 'Create') : Yii::t('site', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
