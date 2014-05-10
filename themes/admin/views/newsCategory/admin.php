<?php
/* @var $this NewsCategoryController */
/* @var $model NewsCategory */

$this->breadcrumbs = array(
    'News Categories' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
$this->pageTitle = Yii::app()->name . ' - News Category';
$this->heading = '<i class="fa fa-archive"></i> Manage News Category';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>

<?php
$this->widget('yiiwheels.widgets.grid.WhGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'news-category-grid',
    //'dataProvider' => $model->search(),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',            
            'value' => '$data->id',
            'visible' => false,
            'htmlOptions' => array('style' => "text-align:left; width:100px;", 'title' => 'ID'),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            //'value' => CHtml::listData(NewsCategory::model()->findAll(),'id', 'title','getparent.title'),
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/newsCategory/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
        ),
        array(
            'name' => 'parent_id',
            'type' => 'raw',
            'value' => 'NewsCategory::getNewsCategoryName($data->parent_id)',
            //'value' => '$data->parent_id',
            'filter' => CHtml::activeDropDownList($model, 'parent_id', CHtml::listData(NewsCategory::model()->findAll(array('condition' => 'parent_id=0', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
        ),
        array(
            'name' => 'published',
            'header' => "Status",
            'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        'ordering',
        /*
        array(
            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
            'name' => 'ordering',
            'sortable'=>false,
            'editable' => array(
                            'type'      => 'text',
                            'model' => $model,
                            'attribute' => 'ordering',
                            'url' => $this->createUrl('/newsCategory/update'),
                            'placement' => 'right',
                            'inputclass' => 'span3'
                        )
        ),
         * 
         */
        array(            
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header'=>'Actions',
        ),
    ),
));

?>
