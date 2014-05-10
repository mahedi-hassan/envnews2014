<?php
/* @var $this MagazineController */
/* @var $model Magazine */
?>

<?php
$this->breadcrumbs=array(
	'Magazines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Magazine', 'url'=>array('index')),
	array('label'=>'Manage Magazine', 'url'=>array('admin')),
);
?>

<h1>Create Magazine</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>