<?php
$this->breadcrumbs=array(
	'Subscriptions'=>array('package/group'),
	'subscribe',
);
?>

<h1 class="alert alert-success">Subscription</h1>

<?php echo $this->renderPartial('_subscribe', array('model'=>$model,'user' => $user, 'profile' => $profile, 'package_id' => $package_id, 'package_group' => $package_group)); ?>