<?php ?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'subscription-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <div class="well well-large">

    <?php echo $form->DropDownListControlGroup($model, 'user_id', CHtml::listData(User::model()->findAll(array('condition' => '', "order" => "name asc")), 'id', 'name'), array('class' => 'span5', 'empty' => 'Select user')); ?>

    <?php echo $form->DropDownListControlGroup($model, 'status', array('0' => 'Inactive', '1' => 'Active'), array('empty' => '--- Choose---', 'span' => 5)); ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE)),
        TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size' => TbHtml::BUTTON_SIZE_LARGE)),
    ));
    ?>
    <?php $this->endWidget(); ?>
        </div>

</div><!-- form -->