<?php
$this->breadcrumbs=array(
	'Project Thesises'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List','url'=>array('index'), 'active' => true, 'icon' => 'icon-list'),
	array('label'=>'Create','url'=>array('create'), 'active' => true, 'icon' => 'icon-file'),
	array('label'=>'View','url'=>array('view','id'=>$model->id), 'active' => true, 'icon' => 'icon-th-large'),
	array('label'=>'Manage','url'=>array('admin'), 'active' => true, 'icon' => 'icon-home'),
	);
	?>

	<h1>Update ProjectThesis <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>