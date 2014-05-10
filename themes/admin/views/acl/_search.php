<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php echo $form->DropDownListControlGroup($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'controller', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'actions', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->DropDownListControlGroup($model, 'access', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
<?php $this->endWidget(); ?>
