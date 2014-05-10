<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
$this->heading = '<i class="icon-mobile-phone"></i> Contact';
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    )); ?>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
    <?php echo $form->labelEx($model, 'Name'); ?>
    <?php echo $form->textField($model,'name'); ?>
        
    <?php echo $form->labelEx($model, 'E-mail'); ?>    
    <?php echo $form->textField($model,'email'); ?>
        
    <?php echo $form->labelEx($model, 'Subject'); ?> 
    <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>

    <?php echo $form->labelEx($model, 'Message'); ?> 
    <?php echo $form->textArea($model,'body',array('rows'=>6, 'class'=>'span8')); ?>

	<?php //if(CCaptcha::checkRequirements()): ?>
		<?php //echo $form->captchaRow($model,'verifyCode',array(
            //'hint'=>'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.',
        //)); ?>
	<?php //endif; ?>

		<?php echo TbHtml::formActions(array(
                        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
                        TbHtml::resetButton('Reset'),
                    )); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>