<?php
$this->breadcrumbs=array(
	'News',
);

?>

<h1>News</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
