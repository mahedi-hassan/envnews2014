<?php
$this->breadcrumbs=array(
	'News Sources'=>array('admin'),
	'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
$this->pageTitle = Yii::app()->name . ' - News Source';
$this->heading = '<i class="fa fa-archive"></i> Manage News Source';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-source-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage News Sources</h1>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'fluid striped bordered condensed',
    'id' => 'news-source-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'visible' => false,
            'value' => '$data->id',
            'htmlOptions' => array('style' => "text-align:left; width:100px;", 'title' => 'ID'),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/newsSource/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
       
        array(
            'name' => 'description',
            'type' => 'raw',
            'value' => '$data->description',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
        
        array(
            'name' => 'published',
            'header' => "Status",
            'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:left; width:100px;"),
        ),
        
        array(
            'name' => 'lang',
            'header' => "Language",
            'value' => '$data->lang?Yii::t(\'app\',\'Bangla\'):Yii::t(\'app\', \'English\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'English'), '1' => Yii::t('app', 'Bangla')),
            'htmlOptions' => array('style' => "text-align:left; width:100px;"),
        ),
        array(
            'header'=>'Actions',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
        
    ),
));