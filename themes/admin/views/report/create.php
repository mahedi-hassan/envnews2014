<?php
/* @var $this ReportController */
/* @var $model Report */
?>

<?php
$this->breadcrumbs = array(
    'Reports' => array('admin'),
    'Create',
);

$this->pageTitle = Yii::app()->name . ' - Reports';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create Report';

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>Create Report</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>