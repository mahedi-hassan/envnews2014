<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 255)); ?>

    <?php echo $form->textFieldControlGroup($model, 'writter', array('span' => 5, 'maxlength' => 255)); ?>

    <?php echo $form->textFieldControlGroup($model, 'publication', array('span' => 5, 'maxlength' => 150)); ?>

    <?php echo $form->textFieldControlGroup($model, 'published_time', array('span' => 5, 'maxlength' => 100)); ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->