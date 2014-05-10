<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


		<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldControlGroup($model,'status',array('class'=>'span5')); ?>

    <?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
