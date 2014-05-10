<?php
/* @var $this ProjectThesisController */
/* @var $model ProjectThesis */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'project-thesis-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

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

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->