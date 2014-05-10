<?php

$this->pageTitle = "Online Users - " . Yii::app()->name;
$this->breadcrumbs = array(
    'Online Users' => array('admin'),
    'Manage',
);
$this->menu = array(
    array('label' => 'Manage Online Users', 'url' => array('user'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<div class="well">
    <?php Yii::app()->counter->refresh(); ?>
    <h4 class="alert alert-info"><i class="fa fa-users"></i> &nbsp;Online visitor counter</h4>    
<b>online: </b><?php echo Yii::app()->counter->getOnline(); ?><br />
<b>today: </b><?php echo Yii::app()->counter->getToday(); ?><br />
<b>yesterday: </b><?php echo Yii::app()->counter->getYesterday(); ?><br />
<b>total: </b><?php echo Yii::app()->counter->getTotal(); ?><br />
<b>maximum: </b><?php echo Yii::app()->counter->getMaximal(); ?><br />
<b>date for maximum: </b><?php echo date('d.m.Y', Yii::app()->counter->getMaximalTime()); ?>
</div>
<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'online-user-grid',
    'dataProvider' => $model->search_user(),
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
