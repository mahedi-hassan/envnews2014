<?php
/* @var $this ReportController */
/* @var $model Report */
?>

<?php
$this->breadcrumbs = array(
    'Reports' => array('admin'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
$this->pageTitle = Yii::app()->name . ' - Reports';
$this->heading = '<i class="fa fa-edit"></i> View Report';
?>

<h1>View Report #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'description',
        'reporter',
        'published_by',
        'published_time',
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'value' => getUserName($model->created_by),
        ),
        array(
            'name' => 'created_time',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->created_time)),
        ),
        array(
            'name' => 'modified_by',
            'type' => 'raw',
            'value' => getUserName($model->modified_by),
        ),
        array(
            'name' => 'modified_time',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->modified_time)),
        ),
        array(
            'name' => 'status',
            'value' => $model->status ? "Active" : "Inactive",
        ),
    ),
));

function getUserName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('name')
            ->from('{{user_admin}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>