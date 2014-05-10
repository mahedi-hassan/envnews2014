<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-admin-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
<?php $this->endWidget(); ?>
