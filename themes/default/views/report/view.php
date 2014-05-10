<?php
/* @var $this ReportController */
/* @var $model Report */
?>

<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Report', 'url'=>array('index')),
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'Update Report', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Report', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Report', 'url'=>array('admin')),
);
?>

<h1>View Report #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
		'description',
		'reporter',
		'published_by',
		'published_time',
		'created_by',
		'created_time',
		'modified_by',
		'modified_time',
		'status',
	),
)); ?>