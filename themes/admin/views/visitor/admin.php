<?php

$this->pageTitle = 'Admin Visitors - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Admin Visitors' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage Admin Visitors', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'Truncate Admin Data', 'url' => array('truncate'), 'active' => true, 'icon' => 'icon-remove'),
);
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker1').datepicker();
    $('#datepicker2').datepicker();
}
");
?>
<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'visitor-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        /*
          array(
          'name' => 'user_type',
          'value' => '$data->user_type?Yii::t(\'app\',\'Admin User\'):Yii::t(\'app\', \'Site User\')',
          'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Site User'), '1' => Yii::t('app', 'Admin User')),
          'htmlOptions' => array('style' => "text-align:left;"),
          ),
         */
        array(
            'name' => 'user_id',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode(UserAdmin::get_user_name($data->user_id)), array("/userAdmin/view","id"=>$data->user_id))',
            'filter' => CHtml::activeDropDownList($model, 'user_id', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        'user_name',
        'page_title',
        'page_link',
        array(
            'name' => 'server_time',
            'value' => 'date("F j, Y, g:i A", strtotime($data->server_time))',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'server_time', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        'browser',
        'visitor_ip',
        array(
            'header' => 'Actions',
            'template' => '{delete}',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
