<?php
/* @var $this NewsCategoryController */
/* @var $model NewsCategory */

$this->breadcrumbs=array(
	'News Categories'=>array('admin'),
	$model->title,
);

$this->menu=array(
	array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
        array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
        array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
        array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),

);
$this->pageTitle = Yii::app()->name . ' - News Category';
$this->heading = '<i class="fa fa-eye"></i> View News Category';
?>
<div class="form-actions">
    <h2><?php echo $model->title; ?></h2>
</div>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'parent_id',
            'type' => 'raw',
            'value' => $model->getNewsCategoryName($model->parent_id),
        ),
        'title',
        'alias',
        array(
            'name' => 'description',
            'type' => 'raw',
            'value' => $model->description,
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        array(
            'name' => 'published',
            'value' => $model->published ? "Yes" : "No",
        ),
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'value' => $model->getUserName($model->created_by),
        ),
        array(
            'name' => 'created_date',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->created_date)),
        ),
        array(
            'name' => 'modified_by',
            'type' => 'raw',
            'value' => $model->getUserName($model->modified_by),
        ),
        array(
            'name' => 'modified_date',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->modified_date)),
        ),
        'ordering',
    ),
));
?>
