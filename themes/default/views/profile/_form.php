<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-profile-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'user_id',array('class'=>'span5')); ?>

<?php echo $form->textFieldControlGroup($model, 'gender', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldControlGroup($model, 'profile_picture', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'country_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'state_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'city_id', array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'address', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'mobile', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'phone', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'fax', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'website', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->textFieldControlGroup($model, 'expiry', array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'birth_date', array('class' => 'span5')); ?>

<?php
            echo TbHtml::formActions(array(
                TbHtml::submitButton($model->isNewRecord ? 'create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain', 'style' => 'width: 228px')),
                TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain pull-right', 'style' => 'width: 228px')),
            ));
        ?>

<?php $this->endWidget(); ?>
