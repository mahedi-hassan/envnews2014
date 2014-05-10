<?php
/* @var $this BookController */
/* @var $model Book */
?>

<?php
$this->breadcrumbs = array(
    'Books' => array('admin'),
    'Create',
);
$this->pageTitle = Yii::app()->name . ' - Books';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create Book';
$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>Create Book</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>