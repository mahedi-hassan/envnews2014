<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acl-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->DropDownListControlGroup($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'controller', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'actions', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'action_title', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->DropDownListControlGroup($model, 'access', array('1' => 'Yes', '0' => 'No'), array('class' => 'span5')); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
