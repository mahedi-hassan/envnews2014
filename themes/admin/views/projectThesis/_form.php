<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'project-thesis-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 250)); ?>
<?php echo $form->labelEx($model, 'abstract'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'abstract')); ?>
<?php echo $form->labelEx($model, 'methodology'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'methodology')); ?>
<?php echo $form->labelEx($model, 'result'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'result')); ?>
<?php echo $form->labelEx($model, 'conclusion'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'conclusion')); ?>
<?php echo $form->textFieldControlGroup($model, 's_name', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 's_email', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 's_contact', array('class' => 'span5', 'maxlength' => 50)); ?>
<?php echo $form->labelEx($model, 's_submission_date'); ?>
<?php           
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'en',
            'model' => $model,
            'attribute' => 's_submission_date',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd', // save to db format
                'showOtherMonths' => true,
                'selectOtherMonths' => true,
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '1800:2100',
                //'altField' => '#self_pointing_id',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            'htmlOptions' => array(
                'style' => '',
                'class' => 'span5',
                'placeholder' => 'Date of Published',
            ),
        ));
        ?>
<?php echo $form->DropDownListControlGroup($model, 's_department', CHtml::listData(ProjectDepartment::model()->findAll(array('condition' => 'status=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->DropDownListControlGroup($model, 's_university', CHtml::listData(University::model()->findAll(array('condition' => 'status=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->DropDownListControlGroup($model, 'status', array('1' => 'Yes', '0' => 'No'), array('class' => 'span2')); ?>

<?php

echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
));
?>


<?php $this->endWidget(); ?>
