<?php
$this->breadcrumbs = array(
    'Packages',
);
?>

<h1>Select Package</h1>
<div class="row-fluid">
    <div class="span12 well well-large">
        <div class="pricing-table pricing-four-column">
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'summaryText' => '',
            ));
            ?>
        </div>
    </div>        
</div>