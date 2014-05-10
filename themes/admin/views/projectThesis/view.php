<?php
$this->breadcrumbs = array(
    'Project Thesises' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List', 'url' => array('index'), 'active' => true, 'icon' => 'icon-list'),
    array('label' => 'Create', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>View ProjectThesis #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'abstract',
        'methodology',
        'result',
        'conclusion',
        's_name',
        's_email',
        's_contact',
        's_department',
        's_university',
        's_submission_date',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by',
        array(
            'name' => 'status',
            'value' => $model->status ? "Active" : "Inactive",
        ),
    ),
));
?>
