<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="author" content="S.M. Saidur Rahman">
            <meta name="generator" content="Envnews" />
            <?php Yii::app()->bootstrap->register(); ?>
            <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/lib/font-awesome/css/font-awesome.min.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
            <?php $this->widget('ext.widgets.googleAnalytics.EGoogleAnalyticsWidget', array('account' => 'UA-32566294-1', 'domainName' => 'envnews.org')); ?>
    </head>
    <body oncontextmenu="return false;" ondragstart="return false" onselectstart="return false">
        <?php Yii::app()->counter->refresh(); ?>
        <?php $this->visitorStatistics(); ?>        
        <section id="navigation-main">
            <?php require_once('navigation.php') ?>
        </section>
        <section class="main-body">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <?php if (isset($this->breadcrumbs)): ?>
                            <?php
                            $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                                'links' => $this->breadcrumbs,
                            ));
                            ?>
                        </div>                    
                    <?php endif ?>
                    <?php if (($this->menu)): ?>
                        <div class="span12">
                            <?php
                            $this->widget('bootstrap.widgets.TbNav', array(
                                'type' => 'pills',
                                'stacked' => false,
                                'items' => $this->menu,
                                'htmlOptions' => array('class' => 'pull-right'),
                            ));
                            ?>
                        </div>
                    <?php endif ?>
                    <?php if (!Yii::app()->user->hasFlash(null)): ?>
                        <div class="span12">
                            <?php
                            $this->widget('bootstrap.widgets.TbAlert', array(
                                'block' => true,
                                'fade' => true,
                                'closeText' => '&times;',
                            ));
                            /*Yii::app()->clientScript->registerScript(
                                    'myHideEffect', '$(".alert-error").animate({opacity: 1.0}, 5000).fadeOut("slow");', CClientScript::POS_READY
                            );*/
                            ?>
                        </div>
                        <?php endif ?>
                        <?php echo $content; ?>                  
                </div>  
            </div>
        </section>
<?php require_once('footer.php') ?>        
    </body>
</html>
