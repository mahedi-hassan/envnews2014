<?php

$this->pageTitle = 'Admin Audit Trails - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Admin Audit Trails' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage Admin Audit Trails', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'audit-trail-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'user_id',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode(UserAdmin::get_user_name($data->user_id)), array("/userAdmin/view","id"=>$data->user_id))',
            'filter' => CHtml::activeDropDownList($model, 'user_id', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Name'),
        ),
        array(
            'name' => 'login_time',
            'type' => 'raw',
            'value' => 'AuditTrail::get_date_time($data->login_time)',
            'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Login time'),
        ),
        array(
            'name' => 'logout_time',
            'type' => 'raw',
            'value' => 'AuditTrail::get_date_time($data->logout_time)',
            'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'Logout time'),
        ),
        array(
            'header' => 'Duration',
            'type' => 'raw',
            'value' => 'AuditTrail::returnInterval($data->login_time,$data->logout_time)',
        ),
        array(
            'header' => 'Actions',
            'template' => '{delete}',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
