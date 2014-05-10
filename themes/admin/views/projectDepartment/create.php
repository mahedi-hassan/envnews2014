<?php
$this->breadcrumbs=array(
	'Project Departments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List','url'=>array('index'),'active' => true,'icon' => 'icon-list'),
array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>Create ProjectDepartment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>