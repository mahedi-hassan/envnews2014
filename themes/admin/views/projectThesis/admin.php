<?php
$this->breadcrumbs = array(
    'Project Thesises' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('project-thesis-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'project-thesis-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'value' => '$data->id',
            'visible' => false,
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("/projectThesis/view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),        
          's_name',
          's_email',
          's_contact',
        array(
            'name' => 's_department',
            'type' => 'raw',
            'header' => 'Department',
            'value' => 'getDepartmentName($data->s_department)',
            'filter' => CHtml::activeDropDownList($model, 's_department', CHtml::listData(ProjectDepartment::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Uploader'),
        ),
        array(
            'name' => 's_university',
            'type' => 'raw',
            'header' => 'University',
            'value' => 'getUniversityName($data->s_university)',
            'filter' => CHtml::activeDropDownList($model, 's_university', CHtml::listData(University::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Uploader'),
        ),
          array(
            'name' => 'created_by',
            'type' => 'raw',
            'header' => 'Uploader',
            'value' => 'getUserName($data->created_by)',
            'filter' => CHtml::activeDropDownList($model, 'created_by', CHtml::listData(UserAdmin::model()->findAll(array('condition' => '', "order" => "name")), 'id', 'name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Uploader'),
        ),
          array(
            'name' => 'status',
            'header' => 'Status',
            'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'header'=>'Actions',
            'class' => 'bootstrap.widgets.TbButtonColumn',
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
function getDepartmentName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{project_department}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
function getUniversityName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{university}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>
