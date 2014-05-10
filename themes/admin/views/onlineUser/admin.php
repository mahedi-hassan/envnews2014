<?php

$this->pageTitle = "Online Admin Users - " . Yii::app()->name;
$this->breadcrumbs = array(
    'Online Admin Users' => array('admin'),
    'Manage',
);
$this->menu = array(
    array('label' => 'Manage Online Admin Users', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'online-user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'Name',
            'name' => 'userId',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode(UserAdmin::get_user_name($data->userId)), array("/userAdmin/view","id"=>$data->userId))',
            'filter' => CHtml::activeDropDownList($model, 'userId', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Full Name'),
        ),
        array(
            'name' => 'expire',
            'type' => 'raw',
            'value' => 'AuditTrail::returnInterval(OnlineUser::get_ts_time($data->expire),OnlineUser::get_current_time())',
        ),
        array(
            'header' => 'Shut down',
            'type' => 'raw',
            'value' => 'OnlineUser::shut_down($data->userId)',
            'htmlOptions' => array('style' => "text-align:center;width:100px;"),
        ),
    ),
));
?>
