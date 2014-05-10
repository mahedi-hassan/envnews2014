<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'alias',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaControlGroup($model,'introtext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'fulltext',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'state',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'catid',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'created_by',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'modified_by',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'publish_up',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'publish_down',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'ordering',array('class'=>'span5')); ?>

	<?php echo $form->textAreaControlGroup($model,'metakey',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'metadesc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'hits',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'featured',array('class'=>'span5')); ?>

	<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
