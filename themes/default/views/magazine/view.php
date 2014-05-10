<?php
/* @var $this MagazineController */
/* @var $model Magazine */
?>

<?php
$this->breadcrumbs=array(
	'Magazines'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Magazine', 'url'=>array('index')),
	array('label'=>'Create Magazine', 'url'=>array('create')),
	array('label'=>'Update Magazine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Magazine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Magazine', 'url'=>array('admin')),
);
?>

<h1>View Magazine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
		'cover_image',
		'description',
		'issue_no',
		'published_by',
		'published_time',
		'created_by',
		'created_time',
		'modified_by',
		'modified_time',
		'status',
	),
)); ?>