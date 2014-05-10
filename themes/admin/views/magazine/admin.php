<?php
/* @var $this MagazineController */
/* @var $model Magazine */


$this->breadcrumbs = array(
    'Magazines' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
$this->pageTitle = Yii::app()->name . ' - Magazines';
$this->heading = '<i class="fa fa-archive"></i> Manage Magazines';
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#magazine-grid').yiiGridView('update', {
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
    'id' => 'magazine-grid',
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
            'name' => 'cover_image',
            'type' => 'html',
            'value' => 'CHtml::image(Yii::app()->baseUrl . "/uploads/magazines/" . $data->cover_image, "Cover Image", array("class" => "span12 thumbnail", "style" => ""))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Cover Image', 'class' => 'span2'),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'header' => 'title',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/magazine/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
        'issue_no',
        'published_by',
        'published_time',
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'value' => 'getUserName($data->created_by)',
            'filter' => CHtml::activeDropDownList($model, 'created_by', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Uploader'),
        ),
        array(
            'name' => 'created_time',
            'value' => 'date("d - m - Y", strtotime($data->created_time))',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'created_time', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'name' => 'status',
            'header' => 'status',
            'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'header' => 'Actions',
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
?>