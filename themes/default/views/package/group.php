<?php
$this->breadcrumbs = array(
    'Packages' => array('index'),
    'Create',
);
?>

<h1>Select your Subscription Plan</h1>
<div class="row-fluid">
    <div class="span12 well well-large">
        <div class="pricing-table pricing-three-column">            
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_group',
                'summaryText' => '',
            ));
            ?>
        </div>
    </div>
</div>