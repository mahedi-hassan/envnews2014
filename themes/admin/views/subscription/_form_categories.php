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

    <h5 class="alert alert-info">Subscription for <span class="text-success"><?php echo User::getName($model->user_id); ?></span></h5>

    <?php echo $form->DropDownListControlGroup($model, 'categories', CHtml::listData(NewsCategory::model()->findAll(array('condition' => 'parent_id IN (14,15,16) and published=1', "order" => "ordering asc")), 'id', 'title'), array('multiple' => 'multiple', 'class' => 'span5', 'style' => 'height: 500px;')); ?>


    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE)),
        TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size' => TbHtml::BUTTON_SIZE_LARGE)),
    ));
    ?>
    <?php $this->endWidget(); ?>
    <?php

    function getSubs($id) {
        $subs = Subscription::model()->findByAttributes(array('package_id' => $id));
        return $subs->subscription_type;
    }
    ?>

</div><!-- form -->