<?php
/* @var $this MagazineController */
/* @var $model Magazine */
?>

<?php
$this->breadcrumbs = array(
    'Magazines' => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);
$this->pageTitle = Yii::app()->name . ' - Magazines';
$this->heading = '<i class="fa fa-edit"></i> Edit Magazines';
$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>

<h1>Update Magazine <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>