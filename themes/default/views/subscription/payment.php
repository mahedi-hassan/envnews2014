<?php
$this->breadcrumbs = array(
    'Subscriptions' => array('package/group'),
    'payment'
);
?>

<h1 class="alert alert-success">Subscription Payment</h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'user_id',
        'package_id',
        'subscription_type',
    ),
));
?>