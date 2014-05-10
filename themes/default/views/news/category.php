<?php
$this->pageTitle = $this->get_category_name($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $this->get_category_name($_GET['id']),
);
?>

<div class="row-fluid">    
    <div class="span9">
        <?php $this->get_children_categories($_GET['id']); ?>
        <fieldset>
            <legend><?php print $this->get_category_name($_GET['id']); ?></legend>
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