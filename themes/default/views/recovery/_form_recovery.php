<?php
$forms = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-recovery-form',
    'enableAjaxValidation' => false,
        ));
?>
<h3>Recovery access</h3>
<?php echo $forms->textField($form, 'login_or_email', array('class' => 'span4', 'maxlength' => 100, 'label' => false, 'placeholder' => 'Username or Email')); ?>
<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton('Restore', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
));
?> 
<?php $this->endWidget(); ?>
