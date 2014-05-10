<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
<div class="span5">
        <?php echo $form->labelEx($model, 'catid'); ?>
        <?php
        if ($model->isNewRecord) {
            echo ContentCategory::get_category_new('Content', 'catid');
        } else {
            echo ContentCategory::get_category_update('Content', 'catid', $model->catid);
        }
        ?>
    </div>
    <div class="clearfix"></div>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->labelEx($model, 'introtext'); ?>
<?php //$this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'attribute' => 'introtext', 'editorOptions' => array('autoresize' => true),)); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'introtext'));?>
<?php echo $form->labelEx($model, 'fulltext'); ?>
<?php //$this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'attribute' => 'fulltext', 'editorOptions' => array('autoresize' => true),)); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'fulltext'));?>
<?php echo $form->dropDownListControlGroup($model, 'state', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'featured', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span5')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
</div>
<?php $this->endWidget(); ?>
