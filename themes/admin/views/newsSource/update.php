<?php
/* @var $this NewsSourceController */
/* @var $model NewsSource */

$this->breadcrumbs=array(
	'News Sources'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
$this->pageTitle = Yii::app()->name . ' - News Source';
$this->heading = '<i class="fa fa-edit"></i> Edit News Source';
?>

<div class="form-actions">
    <h2><?php echo $model->title; ?></h2>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>