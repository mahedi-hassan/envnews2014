<?php
/* @var $this NewsSourceController */
/* @var $model NewsSource */

$this->breadcrumbs=array(
	'News Sources'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
$this->pageTitle = Yii::app()->name . ' - News Source';
$this->heading = '<i class="fa fa-plus-square-o"></i> Create News Source';
?>

<div class="form-actions">
    <h2>New</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>