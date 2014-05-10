<?php
$this->breadcrumbs = array(
    'Content Categories' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
$this->pageTitle = Yii::app()->name . ' - Content Category';
$this->heading = '<i class="fa fa-inbox"></i> Manage Content Category';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('content-category-grid', {
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
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'content-category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'value' => '$data->id',
            'visible' => FALSE,            
        ),        
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/contentCategory/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
        ),        
        'alias',
        array(
            'name' => 'parent_id',
            'type' => 'raw',
            'header' => 'Parent Category',
            'value' => 'getCategoryName($data->parent_id)',
            'filter' => ContentCategory::get_category_update('ContentCategory', 'parent_id', $model->parent_id),
        ),
        array(
            'name' => 'description',
            'type' => 'raw',            
            'value' => '$data->description',
        ),
        array(
            'name' => 'published',
            'header' => "Status",
            'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => "Actions",
        ),
    ),
));

/**
 * Retrieves Category name by ID.
 * @return string.
 */
function getCategoryName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{content_category}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();
    if ($returnValue <= '0') {
        $returnValue = 'No parent!';
    } else {
        $returnValue = $returnValue;
    }
    return $returnValue;
}
?>
