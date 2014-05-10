<?php
/* @var $this SiteController */
/* @var $model LoginFormAdmin */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
?>
<div class="container">
<div class="raw">
    <div id="push"></div>
<div class="span7 center well login_box">
<div class="raw">
    <div class="thumbnail" style="height:100px;">
    <div class="span3">
        <img src="<?php echo Yii::app()->request->baseUrl.'/images/envnews_logo.png'?>" width="220" alt="">
</div>
    <div class="span3 pull-right">
        <h2>Envnews.org</h2><h4>information is power</h4>
</div>
    </div>
    <span class="clearfix"></span>
    <hr>
    <div class="span3 pull-left">
        <img src="<?php echo Yii::app()->request->baseUrl.'/themes/admin/images/key-icon.jpg'?>" width="220" alt="">
  </div>
    <div class="span3 pull-right">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        //'type' => 'inline',
        'enableClientValidation' => true,
        //'htmlOptions' => array('class' => 'well'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span2', 'placeholder' => 'Username', 'prepend' => '<i class="icon-user"></i>')); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span2', 'placeholder' => 'Password', 'prepend' => '<i class="icon-share"></i>')); ?>
    <span class="clearfix"></span>
    <?php echo $form->checkBoxControlGroup($model, 'rememberMe'); ?>
    <?php echo TbHtml::submitButton('Sign in', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_DEFAULT)); ?>
    <?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
