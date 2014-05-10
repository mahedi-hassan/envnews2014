<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<div class="well well-large">
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->passwordFieldControlGroup($model, 'password', array('value' => '', 'class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->passwordFieldControlGroup($model, 'verifyPassword', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'update', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
</div>
<?php $this->endWidget(); ?>