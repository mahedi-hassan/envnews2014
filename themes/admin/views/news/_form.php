<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'news-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <div class="span3">
        <?php echo $form->labelEx($model, 'cat_id'); ?>
        <?php
        if ($model->isNewRecord) {
            echo NewsCategory::get_category_new('News', 'cat_id');
        } else {
            echo NewsCategory::get_category_update('News', 'cat_id', $model->cat_id);
        }
        ?>
    </div>
    <div class="span3">
        <?php echo $form->DropDownListControlGroup($model, 'sorc_id', CHtml::listData(NewsSource::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12')); ?>
    </div>
    <div class="span3">
        <?php echo $form->textFieldControlGroup($model, 'writter', array('class' => 'span12', 'maxlength' => 150)); ?>
    </div>
    <div class="span3">
        <?php //echo $form->dateFieldControlGroup($model, 'published_date', array('prepend' => '<i class="icon-calendar"></i>')); ?>
        <?php echo $form->labelEx($model, 'published_date'); ?>            
        <?php           
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'en',
            'model' => $model,
            'attribute' => 'published_date',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd', // save to db format
                'showOtherMonths' => true,
                'selectOtherMonths' => true,
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '1800:2100',
                //'altField' => '#self_pointing_id',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            'htmlOptions' => array(
                'style' => '',
                'class' => 'span12',
                'placeholder' => 'Date of Published',
            ),
        ));
        ?>
    </div>
</div>
<?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span12', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'sub_title', array('class' => 'span12', 'maxlength' => 255)); ?>
<?php echo $form->labelEx($model, 'introtext'); ?>
<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array('model' => $model, 'attribute' => 'introtext'));?>
<?php
/*
  $this->widget('application.extensions.tinymce.ETinyMce', array(
  'name' => 'introtext',
  'useSwitch' => false,
  'editorTemplate' => 'simple'
  )
  );
 */
?>
<?php /*
$this->widget(
        'ext.widgets.redactorjs.Redactor', array(
    'editorOptions' => array(
        'imageUpload' => Yii::app()->createAbsoluteUrl('/news/upload'),
        'imageGetJson' => Yii::app()->createAbsoluteUrl('/news/listimages')
    ),
    'model' => $model,
    'attribute' => 'introtext'));
 * 
 */
?>
<br />

<span class="clearfix"></span>
<hr>
<div class="row-fluid">    
    <div class="span2">
        <?php echo $form->fileFieldControlGroup($model, 'news_image', array('class' => 'span12')); ?>
    </div>
    <div class="span4">
        <?php echo $form->textFieldControlGroup($model, 'image_caption', array('class' => 'span12', 'maxlength' => 255)); ?>
    </div>
    <div class="span2">
        <?php echo $form->DropDownListControlGroup($model, 'state', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->DropDownListControlGroup($model, 'featured', array('0' => 'No', '1' => 'Yes'), array('class' => 'span12')); ?>
    </div>    
</div>

<?php //echo $form->textAreaControlGroup($model, 'metakey', array('rows' => 6, 'cols' => 50, 'class' => 'span8'));  ?>
<?php //echo $form->textAreaControlGroup($model, 'metadesc', array('rows' => 6, 'cols' => 50, 'class' => 'span8'));   ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>  TbHtml::BUTTON_SIZE_LARGE)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size'=>  TbHtml::BUTTON_SIZE_LARGE)),
    )); ?>

<?php $this->endWidget(); ?>