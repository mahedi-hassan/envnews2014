<?php
$this->breadcrumbs = array(
    'Project Thesises',
);
?>

<div class="row-fluid">
    <div class="span9">
        <fieldset>
            <legend>
                <h1>Project/Thesis</h1>
            </legend>
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


