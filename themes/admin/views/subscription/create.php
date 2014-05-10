<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */
?>

<?php
$this->breadcrumbs=array(
	'Subscriptions'=>array('admin'),
	'Create',
);

$this->menu=array(
array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
$this->pageTitle = Yii::app()->name . ' - Subscriptions';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create Subscriptions';
?>

<h1>Create Subscription</h1>

<?php $this->renderPartial('_form_user', array('model'=>$model)); ?>