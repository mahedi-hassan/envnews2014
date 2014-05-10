<?php
/* @var $this MagazineController */
/* @var $model Magazine */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'cover_image',array('span'=>5,'maxlength'=>250)); ?>

                    <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'issue_no',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'published_by',array('span'=>5,'maxlength'=>150)); ?>

                    <?php echo $form->textFieldControlGroup($model,'published_time',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_by',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'modified_by',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'modified_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->