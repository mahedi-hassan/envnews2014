<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<pre class="prettyprint linenums">
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php echo ContentCategory::get_category_new('ContentCategory', 'parent_id'); ?>
    </div> 
    <div class="clearfix"></div>
    <?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
</pre>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>
<?php $this->endWidget(); ?>
