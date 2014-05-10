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
    
    <?php echo $form->DropDownListControlGroup($model, 'subscription_type', CHtml::listData(PackageGroup::model()->findAll(array('condition' => '', "order" => "title asc")), 'id', 'title'), array('class' => 'span5', 'empty' => 'Select Subscription','ajax' => array(
            'type'=>'POST',
            'url'=>CController::createUrl('subscription/updatesubs'),
            'update'=>'#' . CHtml::activeId($model, 'package_id'),
            'data'=>array('subscription_type'=>'js:this.value')
            )));  ?>
    <?php echo $form->DropDownListControlGroup($model, 'package_id', CHtml::listData(Package::model()->findAll(), 'id', 'packages'), array('empty' => 'Select Package', 'class' => 'span5')); ?>

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