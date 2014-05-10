<?php
$this->breadcrumbs=array(
	'Universities'=>array('index'),
	$model->title,
);

$this->menu=array(
    
array('label'=>'List','url'=>array('index'), 'active' => true, 'icon' => 'icon-list'),
array('label'=>'Create','url'=>array('create'), 'active' => true, 'icon' => 'icon-file'),
array('label'=>'Edit','url'=>array('update','id'=>$model->id), 'active' => true, 'icon' => 'icon-pencil'),
array('label'=>'Delete','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
        );
?>

<h1>View University #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
		array(
                        'name' => 'status',
                        'value' => $model->status ? "Active" : "Inactive",
                    ),
),
)); ?>
