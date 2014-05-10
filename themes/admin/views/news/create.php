<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
$this->pageTitle = Yii::app()->name . ' - News Post';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create News Post';
?>

<h2></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>