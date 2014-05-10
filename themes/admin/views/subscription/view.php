<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */
?>

<?php
$this->breadcrumbs = array(
    'Subscriptions' => array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
$this->pageTitle = Yii::app()->name . ' - Subscriptions';
$this->heading = '<i class="fa fa-eye"></i> Detail Subscriptions';
?>

<h1>View Subscription #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'user_id',
            'type' => 'raw',
            'value' => User::getName($model->user_id),
        ),
        array(
            'name' => 'package_id',
            'type' => 'raw',
            'value' => Package::getPackageName($model->package_id),
        ),
        array(
            'name' => 'subscription_type',
            'type' => 'raw',
            'value' => Package::getPackageGroupName($model->subscription_type),
        ),
        array(
            'name' => 'categories',
            'type' => 'raw',
            'value' => Subscription::get_categories_news($model->categories),
        ),
        array(
            'name' => 'status',
            'value' => $model->status ? "Active" : "Inactive",
        ),
    ),
));
?>