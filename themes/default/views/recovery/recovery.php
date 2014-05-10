<?php
$this->pageTitle = 'Recovery access - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Recovery access',
);
?>
<?php echo $this->renderPartial('_form_recovery', array('form' => $form)); ?>