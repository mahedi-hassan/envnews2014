<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	
    <?php
            $this->widget('bootstrap.widgets.TbAlert', array(
                'block' => true,
                'fade' => true,
                'closeText' => '&times;',
            ));


            if (isset($this->breadcrumbs)):
                ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
                
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>


