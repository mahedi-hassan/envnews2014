<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'subscription-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<div class="well well-large">
    <h3 class="alert alert-info"><span class="muted">You have selected </span><em class="text-success"><?php echo Package::getPackageName($package_id) ?></em><span class="muted"> subscription from </span><em class="text-warning"><?php echo Package::getPackageGroupName($package_group) ?></em><span class="muted"> package.</span>  <?php echo CHtml::link('Change?', array('package/group'), array('class' => 'btn btn-info btn-plain')) ?></h3>
    <div class="row-fluid">
        <div class="span12">
            <?php echo $form->errorSummary(array($model, $user, $profile)); ?>
        </div>
        <div class="span6 no-l-margin">
            <div class="well">
                <h5 class="alert alert-info">Please, fill up the form</h5>
                <?php //$model->package_id = Yii::app()->getRequest()->getParam('id'); ?>
                <?php $model->package_id = $package_id; ?>        
                <?php echo $form->hiddenField($model, 'package_id'); ?>
                <?php $model->subscription_type = $package_group; ?>
                <?php echo $form->hiddenField($model, 'subscription_type'); ?>

                <?php echo $form->textFieldControlGroup($user, 'name', array('class' => 'span12', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldControlGroup($user, 'username', array('class' => 'span12', 'maxlength' => 150)); ?>
                <?php echo $form->emailFieldControlGroup($user, 'email', array('class' => 'span12', 'maxlength' => 100)); ?>
            </div>
            <div class="well">
                <?php echo $form->textFieldControlGroup($profile, 'gender', array('class' => 'span12', 'maxlength' => 20)); ?>   
                <?php echo $form->textFieldControlGroup($profile, 'country_id', array('class' => 'span12')); ?>
                <?php echo $form->textFieldControlGroup($profile, 'state_id', array('class' => 'span12')); ?>
                <?php echo $form->textFieldControlGroup($profile, 'city_id', array('class' => 'span12')); ?>
                <?php echo $form->textFieldControlGroup($profile, 'address', array('class' => 'span12', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldControlGroup($profile, 'mobile', array('class' => 'span12', 'maxlength' => 100)); ?>
                <?php echo $form->textFieldControlGroup($profile, 'phone', array('class' => 'span12', 'maxlength' => 100)); ?>
                <?php echo $form->textFieldControlGroup($profile, 'fax', array('class' => 'span12', 'maxlength' => 100)); ?>
                <?php echo $form->textFieldControlGroup($profile, 'website', array('class' => 'span12', 'maxlength' => 150)); ?>
                <?php echo CHtml::activeLabel($profile, 'birth_date', array('required' => true)); ?>
                <?php echo $form->textField($profile, 'birth_date', array('class' => 'span12')); ?>
            </div>
            <p class="help-block alert alert-block">Fields with <span class="required">*</span> are required.</p>
        </div>
        <div class="span6">
            <div class="well">
                <h5 class="alert alert-info">Please, choose <?php echo Package::get_no_of_cat();?> news categories.</h5>
                <?php echo $form->DropDownListControlGroup($model, 'categories', CHtml::listData(NewsCategory::model()->findAll(array('condition' => 'parent_id IN (14,15,16) and published=1', "order" => "ordering asc")), 'id', 'title'), array('multiple' => 'multiple', 'class' => 'span12', 'style' => 'height: 500px;')); ?>
            </div>
        </div>
    </div>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Subscribe', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain')),
        TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain')),
    ));
    ?>

    <?php $this->endWidget(); ?>
</div>

