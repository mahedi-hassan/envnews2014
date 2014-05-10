<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'currency-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_name', array('class' => 'span5', 'maxlength' => 64)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_code_2', array('class' => 'span5', 'maxlength' => 2)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_code_3', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_numeric_code', array('class' => 'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_exchange_rate', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_symbol', array('class' => 'span5', 'maxlength' => 4)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_decimal_place', array('class' => 'span5', 'maxlength' => 4)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_decimal_symbol', array('class' => 'span5', 'maxlength' => 4)); ?>

<?php echo $form->textFieldControlGroup($model, 'currency_thousands', array('class' => 'span5', 'maxlength' => 4)); ?>

<?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span5')); ?>

<?php echo $form->DropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
