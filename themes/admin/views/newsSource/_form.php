<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'news-source-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldControlGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->labelEx($model,'description'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'description'));?>

<?php echo $form->DropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>

<?php echo $form->DropDownListControlGroup($model, 'lang', array('1' => 'Bangla', '0' => 'English')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
