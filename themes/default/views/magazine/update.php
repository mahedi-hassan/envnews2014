<?php
/* @var $this MagazineController */
/* @var $model Magazine */
?>

<?php
$this->breadcrumbs=array(
	'Magazines'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Magazine', 'url'=>array('index')),
	array('label'=>'Create Magazine', 'url'=>array('create')),
	array('label'=>'View Magazine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Magazine', 'url'=>array('admin')),
);
?>

    <h1>Update Magazine <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>