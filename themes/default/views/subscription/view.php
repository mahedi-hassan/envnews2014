<?php
$this->breadcrumbs=array(
	'Subscriptions'=>array('package/group'),
	$model->id,
);

?>

<h1>View Subscription #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'user_id',
		'package_id',
		'subscription_type',
),
)); ?>
