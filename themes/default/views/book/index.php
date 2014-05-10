<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs = array(
    'Books',
);
?>
<div class="row-fluid">
    <div class="span9">
        <div class="well well-large">
            <h1 class="alert alert-success">Books</h1>            
            <ul class="thumbnails">
                <?php
                $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'emptyText' => 'No records found.',
                    'summaryText' => '',
                ));
                ?>
            </ul>

        </div>
    </div>
    <div class="span3">

    </div>
</div>