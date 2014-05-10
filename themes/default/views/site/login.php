<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<h2>Please, log in to get access.</h2>
<div class="well well-large login">
    <div style="width: 445px; margin: 0 auto;">
        
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'htmlOptions' => array('class' => 'well'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>
        <div style="text-align: center; width: 200px; margin: 0 auto; padding: 5px 0px 25px 0px;">
            <?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . 'guest_icons.jpg', 'Profile Picture', array('alt' => 'Guest photo', 'class' => 'img-circle', 'title' => 'Guest photo', 'style' => 'border: 1px solid #ddd;')); ?>
        </div>
    <?php //echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span4', 'placeholder' => 'Enter your Username', 'prepend' => '<i class="icon-user"></i>')); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span4', 'placeholder' => 'Enter your Password', 'prepend' => '<i class="icon-share"></i>')); ?>
    <?php echo $form->checkboxControlGroup($model, 'rememberMe'); ?>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::link('Forgot your password?', array(''), array('class' => '')); ?>
            <br />
             <?php echo 'New to Envnews? please, '.CHtml::link('register', array('user/create'), array('class' => '')).' .'; ?>
        </div>
        </div>    
    <?php echo TbHtml::submitButton('Log in', array('class' => 'btn-plain', 'block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>
    <?php echo TbHtml::resetButton('Reset', array('class' => 'btn-plain', 'block' => true, 'size'=>TbHtml::BUTTON_SIZE_LARGE, 'color' => TbHtml::BUTTON_COLOR_INVERSE)); ?>
    <?php $this->endWidget(); ?>
    </div>    
</div>
