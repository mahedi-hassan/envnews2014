<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */


$this->breadcrumbs = array(
    'Subscriptions' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subscription-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->pageTitle = Yii::app()->name . ' - Subscriptions';
$this->heading = '<i class="fa fa-archive"></i> Manage Subscriptions';
Yii::app()->clientScript->registerScript('ajaxupdate', "
$('#subscription-grid a.ajaxupdate').live('click', function() {
        $.fn.yiiGridView.update('subscription-grid', {
                type: 'POST',
                url: $(this).attr('href'),
                success: function() {
                        $.fn.yiiGridView.update('subscription-grid');
                }
        });
        return false;
});
");
?>

<h1>Manage Subscriptions</h1>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'subscription-grid',
    'type' => 'bordered condensed hover',
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
            'name' => 'user_id',
            'type' => 'raw',
            'value' => 'User::getName($data->user_id)',
            'filter' => CHtml::activeDropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;"),
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
        ),
        array(
            'name' => 'package_id',
            'type' => 'raw',
            'value' => 'Package::getPackageName($data->package_id)',
            'filter' => CHtml::activeDropDownList($model, 'package_id', CHtml::listData(Package::model()->findAll(array('condition' => '', "order" => "package_name")), 'id', 'package_name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;"),
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
        ),
        array(
            'name' => 'subscription_type',
            'type' => 'raw',
            'value' => 'Package::getPackageGroupName($data->subscription_type)',
            'filter' => CHtml::activeDropDownList($model, 'subscription_type', CHtml::listData(PackageGroup::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;"),
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
        ),
        array(
            'name' => 'categories',
            'type' => 'raw',
            'value' => 'Subscription::get_categories_news($data->categories)',
            //'value' => 'foreach ($data->categories as $category) { NewsCategory::getNewsCategoryName($category)}',
            'filter' => CHtml::activeDropDownList($model, 'categories', CHtml::listData(NewsCategory::model()->findAll(array('condition' => 'parent_id IN (14,15,16) and published=1', "order" => "ordering asc")), 'id', 'title'), array('empty' => 'All')),
            //'filter' => CHtml::activeDropDownList($model, 'subscription_type', CHtml::listData(PackageGroup::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;"),
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
        ),
        //'categories',
        array(
            'name' => 'status',
            'header' => 'status',
            'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
            'htmlOptions' => array('class'=>'alert-success', 'style' => "text-align:center;"),
        ),
        array(
            'name' => 'status',
            'header' => 'Activation',
            'type' => 'raw',
            'value' => 'CHtml::link($data->status?Yii::t(\'app\',\'<span class="btn btn-mini btn-danger">Deactivate</span>\'):Yii::t(\'app\', \'<span class="btn btn-mini btn-success">Activate</span>\'), array("ajaxupdate", "id"=>$data->id), array("class"=>"ajaxupdate"));',
            'filter' => '',
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
        ),
        array(
            'header' => 'Actions',
            'cssClassExpression'=>'$data->status?Yii::t(\'app\',\'alert-success\'):Yii::t(\'app\', \'alert-danger\')',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>