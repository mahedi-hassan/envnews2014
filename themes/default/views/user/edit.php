<?php
$this->pageTitle = 'Change password- ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->name => array('view', 'id' => $model->id),
    'Change password',
);
?>
<h2 class="alert alert-success">Change password</h2>
    <?php $this->renderPartial('_form_edit', array('model' => $model,)); ?>
