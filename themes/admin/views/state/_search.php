<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldControlGroup($model,'country_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'state_name',array('class'=>'span5','maxlength'=>192)); ?>

	<?php echo $form->textFieldControlGroup($model,'state_3_code',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldControlGroup($model,'state_2_code',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldControlGroup($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'published',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'created_on',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'created_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'modified_on',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'modified_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'locked_on',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'locked_by',array('class'=>'span5')); ?>

	<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
