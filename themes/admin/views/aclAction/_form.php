<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acl-action-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php //echo $form->DropDownListControlGroup($model, 'controller_id', CHtml::listData(AclController::model()->findAll(array('condition' => '', "order" => "controller")), 'id', 'controller'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->hiddenField($model, 'controller_id', array('value' => $_GET['cid'], 'class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'action', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
