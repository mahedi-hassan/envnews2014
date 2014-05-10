<?php
$this->breadcrumbs=array(
	'Contents'=>array('admin'),
	'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
$this->pageTitle = Yii::app()->name . ' - Content';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create New Content';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>