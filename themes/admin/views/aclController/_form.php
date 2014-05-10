<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acl-controller-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldControlGroup($model, 'controller', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->DropDownListControlGroup($model, 'controller_type', array('1' => 'Backend', '0' => 'Frontend'), array('class' => 'span5')); ?>
<?php echo $form->DropDownListControlGroup($model, 'status', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'span5')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
