<?php
/* @var $this ProjectThesisController */
/* @var $model ProjectThesis */
?>

<?php
$this->breadcrumbs=array(
	'Project Thesises'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

    <h1>Update ProjectThesis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>