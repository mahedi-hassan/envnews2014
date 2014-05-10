<?php
/* @var $this SubscriptionController */
/* @var $model Subscription */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <?php echo $form->DropDownListControlGroup($model, 'user_id', CHtml::listData(User::model()->findAll(array('condition' => '', "order" => "name asc")), 'id', 'name'), array('class' => 'span5', 'empty' => '--- Choose---')); ?>

    <?php echo $form->DropDownListControlGroup($model, 'package_id', CHtml::listData(Package::model()->findAll(), 'id', 'packages'), array('class' => 'span5', 'empty' => '--- Choose---')); ?>

    <?php echo $form->DropDownListControlGroup($model, 'subscription_type', CHtml::listData(PackageGroup::model()->findAll(array('condition' => '', "order" => "title asc")), 'id', 'title'), array('class' => 'span5', 'empty' => '--- Choose---')); ?>

    <?php echo $form->DropDownListControlGroup($model, 'status', array('0' => 'Inactive', '1' => 'Active'), array('empty' => '--- Choose---', 'span' => 5)); ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    ));
    ?>
    <?php $this->endWidget(); ?>

</div><!-- search-form -->