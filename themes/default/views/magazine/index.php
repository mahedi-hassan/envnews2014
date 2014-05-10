<?php
/* @var $this MagazineController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Magazines',
);

$this->menu=array(
	array('label'=>'Create Magazine','url'=>array('create')),
	array('label'=>'Manage Magazine','url'=>array('admin')),
);
?>

<h1>Magazines</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>