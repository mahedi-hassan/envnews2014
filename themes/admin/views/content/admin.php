<?php
$this->breadcrumbs = array(
    'Contents' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
$this->pageTitle = Yii::app()->name . ' - Content';
$this->heading = '<i class="fa fa-qrcode"></i> Manage Content';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('content-grid', {
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
    'id' => 'content-grid',
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
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/content/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
        array(
            'name' => 'catid',
            'type' => 'raw',
            'value' => 'getCategoryName($data->catid)',
            'filter' => ContentCategory::get_category_update('Content', 'catid', $model->catid),
            //'filter' => CHtml::activeDropDownList($model, 'catid', CHtml::listData(ContentCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
        ),
        array(
            'name' => 'state',
            'value' => '$data->state?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'name' => 'featured',
            'value' => '$data->featured?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'name' => 'created',
            'value' => 'date("d/m/y", strtotime($data->created))',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'created', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'created', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Actions',
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
