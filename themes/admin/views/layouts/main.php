<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <?php
        $baseUrl = Yii::app()->theme->baseUrl;
        Yii::app()->bootstrap->register();
        //$cs = Yii::app()->getClientScript();
        ?>        
        <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/images/favicon.ico"> 
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/lib/font-awesome/css/font-awesome.min.css"/>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
            <!--
            <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
            -->
    </head>
    <body>
        <?php Yii::app()->counter->refresh(); ?>
        <?php $this->visitorStatistics(); ?>
        <!-- BEGIN WRAP -->
        <div id="wrap">
            <?php if (!Yii::app()->user->isGuest): ?>
                <!-- BEGIN TOP BAR -->                 
                <?php require_once('navigation.php'); ?>               
                <!-- END TOP BAR -->  
            <?php endif; ?>           
            <!-- Include content pages -->
            <?php echo $content; ?>                            
            <div class="clearfix"></div>
            <?php if (!Yii::app()->user->isGuest): ?>
                <!-- BEGIN FOOTER -->
                <div id="footer_offset"></div>
                <div id="footer">
                    <div class="push_offset"></div>
                    <div id="credit">
                        <?php require_once('footer.php') ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- END FOOTER -->
        </div>
        <!-- END WRAP -->
    </body>
</html>
