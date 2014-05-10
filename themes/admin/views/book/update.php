<?php
/* @var $this BookController */
/* @var $model Book */
?>

<?php
$this->breadcrumbs = array(
    'Books' => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);
$this->pageTitle = Yii::app()->name . ' - Books';
$this->heading = '<i class="fa fa-edit"></i> Edit Books';
$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>

<h1>Update Book <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>