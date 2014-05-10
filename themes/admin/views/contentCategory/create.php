<?php
$this->breadcrumbs = array(
    'Content Categories' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
$this->pageTitle = Yii::app()->name . ' - Content Category';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create new Content Category';
?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>