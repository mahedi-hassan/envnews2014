<?php
$this->breadcrumbs = array(
    'Project Thesises' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>Create Project/Thesis</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>