<?php
$this->pageTitle = NewsSource::get_source_title($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    NewsSource::get_source_title($_GET['id']),
);
?>
<div class="row">    
    <div class="span9">
        <fieldset>
            <legend><?php echo NewsSource::get_source_title($_GET['id']); ?></legend>
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
            ));
            ?>
        </fieldset>
    </div>
    <div class="span3">
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_news_source_list(); ?>
            </div>
        </div>
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_news_categories(); ?>
            </div>
        </div>
    </div>
</div>
