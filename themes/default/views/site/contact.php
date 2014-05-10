<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('#'), 'active' => true),
    array('label' => 'Library', 'icon' => 'book', 'url' => array('#')),
    array('label' => 'Application', 'icon' => 'pencil', 'url' => array('#')),
    array('label' => 'Profile', 'icon' => 'user', 'url' => array('#')),
    array('label' => 'Settings', 'icon' => 'cog', 'url' => array('#')),
    array('label' => 'Help', 'icon' => 'flag', 'url' => array('#')),
);
?>
<h2>Contact Us</h2>
<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts' => array('contact'),
    ));
    ?>
<?php else: ?>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'contact-form',
            'type' => 'horizontal',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
                ));
        ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldControlGroup($model, 'name'); ?>
        <?php echo $form->textFieldControlGroup($model, 'email'); ?>
        <?php echo $form->textFieldControlGroup($model, 'subject'); ?>
        <?php echo $form->textAreaControlGroup($model, 'body', array('rows' => 6, 'class' => 'span6')); ?>
        <?php if (CCaptcha::checkRequirements()): ?>
            <?php
            echo $form->captchaControlGroup($model, 'verifyCode', array(
                'hint' => 'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.',
            ));
            ?>
        <?php endif; ?>
        <?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
<?php endif; ?>