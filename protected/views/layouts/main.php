<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="container" id="page">
            <div id="header">
                <div id="logo"><b><font color = "orange">Line</font>CRM</b></div>
            </div><!-- header -->
            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => Yii::t('site', 'Home'), 'url' => array('/site/index'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'About'), 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
                        //array('label' => Yii::t('site', 'Contact'), 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'To-Do'), 'url' => array('history/index/'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Persons'), 'url' => array('/person/index'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Payments'), 'url' => array('/site/reconstruct'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Products'), 'url' => array('/site/reconstruct'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Reports'), 'url' => array('/site/reconstruct'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Profiles'), 'url' => array('/profile/index'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Support'), 'url' => array('/site/reconstruct'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => Yii::t('site', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));

                ?>
            </div><!-- mainmenu -->

            <?php echo $content; ?>

            <?php
            if (YII_DEBUG and /* is enable this feature? SET => */ false) {
                echo '<hr color="orange" length="80%">';
                var_dump($this);
            }

            ?>
            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by
                <?php echo Yii::app()->params['powered_by']; ?>.

            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
