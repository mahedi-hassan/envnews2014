<?php
/* @var $this ProjectThesisController */
/* @var $model ProjectThesis */
?>

<?php
$this->breadcrumbs=array(
	'Project Thesises'=>array('index'),
	'Create',
);


?>

<h1>Create ProjectThesis</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>