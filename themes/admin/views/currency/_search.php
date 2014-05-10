<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_name',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_code_2',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_code_3',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_numeric_code',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_exchange_rate',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_symbol',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_decimal_place',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_decimal_symbol',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency_thousands',array('class'=>'span5','maxlength'=>4)); ?>

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
