<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-admin-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary(array($model, $profile)); ?>

<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->passwordFieldControlGroup($model, 'verifyPassword', array('class' => 'span5', 'maxlength' => 100)); ?>
<div class="hidden">
<?php echo $form->hiddenField($profile, 'user_id', array('class' => 'span5')); ?>
</div>
<?php

echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
));
?>
<?php $this->endWidget(); ?>
