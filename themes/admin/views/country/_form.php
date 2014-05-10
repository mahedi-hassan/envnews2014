<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'country-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldControlGroup($model, 'worldzone_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'country_name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldControlGroup($model, 'country_3_code', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldControlGroup($model, 'country_2_code', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span5')); ?>

<?php echo $form->DropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
