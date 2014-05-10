<?php
$this->breadcrumbs=array(
	'Subscriptions'=>array('package/group'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
	?>

	<h1>Update Subscription <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>