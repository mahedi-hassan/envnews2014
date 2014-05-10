<?php
/* @var $this NewsCategoryController */
/* @var $model NewsCategory */

$this->breadcrumbs=array(
	'News Categories'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
$this->pageTitle = Yii::app()->name . ' - News Category';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create News Category';
?>

<h2>Create NewsCategory</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>