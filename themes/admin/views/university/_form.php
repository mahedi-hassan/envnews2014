<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'university-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->DropDownListControlGroup($model, 'status', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'span2')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
