<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs = array(
    'News' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
$this->pageTitle = Yii::app()->name . ' - News Post';
$this->heading = '<i class="fa fa-archive"></i> Manage News Post';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
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
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'news-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',            
            'value' => '$data->id',
			'visible' => false,
            'htmlOptions' => array('style' => "display:none;"),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/news/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
        array(
            'name' => 'cat_id',
            'type' => 'raw',
            'header' => 'News Category',
            'value' => 'getNewsCategoryName($data->cat_id)',
            'filter' => CHtml::activeDropDownList($model, 'cat_id', CHtml::listData(NewsCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'News Category'),
        ),
        array(
            'name' => 'sorc_id',
            'type' => 'raw',
            'header' => 'News Source',
            'value' => 'getSourceName($data->sorc_id)',
            'filter' => CHtml::activeDropDownList($model, 'sorc_id', CHtml::listData(NewsSource::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'News Source'),
        ),
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'header' => 'Uploader',
            'value' => 'getUserName($data->created_by)',
            'filter' => CHtml::activeDropDownList($model, 'created_by', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Uploader'),
        ),
        array(
            'name' => 'state',
            'header' => 'State',
            'value' => '$data->state?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'name' => 'published_date',
            'header' => 'Published',
            'value' => 'date("d/m/y", strtotime($data->published_date))',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'published_date', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'header'=>'Actions',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));

function getUserName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('name')
            ->from('{{user_admin}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}

function getNewsCategoryName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{news_category}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();
    if ($returnValue <= '0') {
        $returnValue = 'No parent!';
    } else {
        $returnValue = $returnValue;
    }
    return $returnValue;
}

function getSourceName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{news_source}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>
