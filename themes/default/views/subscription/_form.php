<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'subscription-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
        <?php $model->user_id = yii::app()->user->name; ?>
	<?php echo $form->textFieldControlGroup($model,'user_id',array('class'=>'span5')); ?>
        
        <?php $model->package_id = Yii::app()->getRequest()->getParam('id'); ?>
	<?php echo $form->uneditableFieldControlGroup($model,'package_id',array('class' => 'span5', 'value' => Package::getPackageName($model->package_id))); ?>

	<?php echo $form->uneditableFieldControlGroup($model,'subscription_type',CHtml::listData(PackageGroup::model()->findAll(array('condition' => 'status=1', "order" => "id")), 'id', 'title'), array('empty' => '--please select--', 'readonly'=>true, 'class' => 'span5')); ?>


<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE)),
    )); ?>

<?php $this->endWidget(); ?>
