<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);

?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
    <?php
    if (defined('YII_DEBUG'))
        echo CHtml::encode($message);
    else
        echo CHtml::encode('How much the fish?!');

    ?>
</div>
