<?php
/* @var $this ProjectThesisController */
/* @var $model ProjectThesis */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textAreaControlGroup($model,'abstract',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'methodology',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'result',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'conclusion',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'s_name',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textFieldControlGroup($model,'s_email',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'s_contact',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'s_department',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'s_university',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_on',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_by',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'modified_on',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'modified_by',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

        <?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->