<?php
$this->breadcrumbs=array(
	'Content Categories'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
$this->pageTitle = Yii::app()->name . ' - Content Category';
$this->heading = '<i class="fa fa-edit"></i> Edit Content Category :: ' . $model->title;
?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>