<?php
$this->breadcrumbs = array(
    'Profile' => array('view', 'id' => $model->id),
    $model->name => array('view', 'id' => $model->id),
    'Edit',
);
?>
<?php
$sub = Subscription::model()->findByAttributes(array('user_id' => $model->id));
?>
<h1><?php echo $model->name; ?></h1>

<?php if(($sub)){
    echo $this->renderPartial('_form_update', array('model' => $model, 'profile' => $profile, 'subscription' => $subscription,));
}
else{
    echo $this->renderPartial('_form_update', array('model' => $model, 'profile' => $profile));
}
?>
