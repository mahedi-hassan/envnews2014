<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-category-form',
    'enableAjaxValidation' => false,
    ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
<div class="span5">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        if ($model->isNewRecord) {
            echo ContentCategory::get_category_new('ContentCategory', 'parent_id');
        } else {
            echo ContentCategory::get_category_update('ContentCategory', 'parent_id', $model->parent_id);
        }
        ?>
    </div>
    <div class="clearfix"></div>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->labelEx($model,'description'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'description'));?>
<?php //echo $form->redactor($model, 'description', array('class'=>'span8', 'cols' => 50)); ?>
<?php echo $form->DropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>
<?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span5')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
</div>
<?php $this->endWidget(); ?>
