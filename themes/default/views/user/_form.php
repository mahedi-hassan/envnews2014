<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<div class="well register">
    <div class="row-fluid">
        <div class="alert alert-success"><h1 class="text-center">User Registration</h1></div>
        <p class="alert alert-info"><b>Already have an account?</b> Please, <strong style="font-size: 16px;"><?php echo CHtml::link('Log in', array('site/login')); ?></strong></p>
        <div class="well span6 no-l-margin">
            <?php echo $form->errorSummary(array($model, $profile,$subscription)); ?>

            <?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span12', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span12', 'maxlength' => 150)); ?>
            <?php echo $form->emailFieldControlGroup($model, 'email', array('class' => 'span12', 'maxlength' => 100)); ?>
            <?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span12', 'maxlength' => 100)); ?>
            <?php echo $form->passwordFieldControlGroup($model, 'verifyPassword', array('class' => 'span12', 'maxlength' => 100)); ?>
            <?php echo $form->hiddenField($profile, 'user_id', array('class' => 'span12')); ?>
            <?php echo $form->hiddenField($subscription, 'user_id', array('class' => 'span12')); ?>
             <?php //echo $form->checkBoxControlGroup($model, 'tos', array('class' => '')); ?>
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
            <?php
            echo TbHtml::formActions(array(
                TbHtml::submitButton($model->isNewRecord ? 'Register' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain', 'style' => 'width: 228px')),
                TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain pull-right', 'style' => 'width: 228px')),
            ));
            ?>
        </div>
        <!--
        <div class="span6 well">
            <div class="alert alert-info"><h2 class="text-center">Get started with Envnews</h2></div>
            <h3>What do you get?</h3>
            <ul class="unstyled">
                <li class="alert alert-info"><i class="fa fa-asterisk"></i>&nbsp; &nbsp;  access to all content(read only)</li>
                <li class="alert alert-info"><i class="fa fa-comments"></i>&nbsp; &nbsp;  Comments and Reviews</li>
                <li class="alert alert-info"><i class="fa fa-adn"></i>&nbsp; &nbsp;  Subscriptions</li>
                <li class="alert alert-info"><i class="fa fa-paperclip"></i>&nbsp; &nbsp;  News letter</li>
            </ul>
            
    </div>-->
    </div>    
</div>
<?php $this->endWidget(); ?>