<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */
?>

<?php
$this->breadcrumbs=array(
	'Subscriptions'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
$this->pageTitle = Yii::app()->name . ' - Subscriptions';
$this->heading = '<i class="fa fa-plus-edit"></i> Update Subscriptions';
?>

    <h1>Update Subscription <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>