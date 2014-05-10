<?php
$this->breadcrumbs = array(
    'Contents' => array('admin'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
$this->pageTitle = Yii::app()->name . ' - News Source';
$this->heading = '<i class="fa fa-eye"></i> View News Source';
?>

<div class="form-actions">
    <h2><?php echo $model->title; ?></h2>
</div>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
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
            'name' => 'lang',
            'value' => $model->lang ? "Bangla" : "English",
        ),
    ),
));
?>
