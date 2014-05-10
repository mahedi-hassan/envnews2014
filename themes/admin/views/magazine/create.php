<?php
/* @var $this MagazineController */
/* @var $model Magazine */
?>

<?php
$this->breadcrumbs = array(
    'Magazines' => array('admin'),
    'Create',
);
$this->pageTitle = Yii::app()->name . ' - Magazines';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create Magazine';
$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>Create Magazine</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>