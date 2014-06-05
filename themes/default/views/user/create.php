<?php
$this->breadcrumbs = array(
    'Users' => array('create'),
    'Sign Up',
);
?>

<h2>Please, Fill up the required field to register</h2>

<?php echo $this->renderPartial('_form', array('model' => $model, 'profile' => $profile, 'subscription' => $subscription)); ?>