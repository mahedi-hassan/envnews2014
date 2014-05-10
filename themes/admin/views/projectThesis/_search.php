<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


		<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldControlGroup($model,'s_name',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldControlGroup($model,'s_email',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldControlGroup($model,'s_contact',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldControlGroup($model,'s_department',array('class'=>'span5')); ?>

		<?php echo $form->textFieldControlGroup($model,'s_university',array('class'=>'span5')); ?>

		<?php echo $form->textFieldControlGroup($model,'s_submission_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldControlGroup($model,'status',array('class'=>'span5')); ?>

	<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
<?php $this->endWidget(); ?>
