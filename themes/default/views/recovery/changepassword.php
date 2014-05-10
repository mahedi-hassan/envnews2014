<?php

$this->pageTitle = 'Change Password - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Change Password',
);
?>
<?php

$forms = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-changepassword-form',
    'enableAjaxValidation' => false,
        ));
?>
<?php echo $forms->errorSummary($form2); ?>
<?php echo $forms->passwordFieldControlGroup($form2, 'password', array('class' => 'span5', 'maxlength' => 100, 'placeholder' => 'Password')); ?>
<?php echo $forms->passwordFieldControlGroup($form2, 'verifyPassword', array('class' => 'span5', 'maxlength' => 100, 'placeholder' => 'Verify Password')); ?>
<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton('Change Password', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
));
?> 
<?php $this->endWidget(); ?>