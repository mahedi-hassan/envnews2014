<script type="text/javascript">
    $(function() {
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    });
</script>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<?php
$sub = Subscription::model()->findByAttributes(array('user_id' => $model->id));
?>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
    <li class=""><a data-toggle="tab" href="#preference">Preference</a></li>
</ul>

<div class="tab-content" id="myTabContent">
    <div id="profile" class="tab-pane fade active in">
        <div class="well">
            <div class="row-fluid">
                <div class="span7 well">
                    <h3 class="alert alert-info">Edit your profile</h3> 
                    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
                    <?php echo $form->errorSummary(array($model, $profile, $subscription)); ?>

                    <?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span12', 'maxlength' => 255)); ?>
                    <?php echo $form->textFieldControlGroup($profile, 'gender', array('class' => 'span12', 'maxlength' => 20)); ?>
                    <?php echo $form->textFieldControlGroup($profile, 'address', array('class' => 'span12', 'maxlength' => 255)); ?>
                    <?php echo $form->textFieldControlGroup($profile, 'mobile', array('class' => 'span12', 'maxlength' => 100)); ?>
                    <?php echo $form->textFieldControlGroup($profile, 'phone', array('class' => 'span12', 'maxlength' => 100)); ?>
                    <?php echo $form->textFieldControlGroup($profile, 'fax', array('class' => 'span12', 'maxlength' => 100)); ?>
                    <?php echo $form->textFieldControlGroup($profile, 'website', array('class' => 'span12', 'maxlength' => 150)); ?>                
                </div>
                <div class="span5 well">
                    <h3 class="alert alert-info">Edit your profile</h3> 
                    <div class="row-fluid">
                        <?php //unlink(getcwd().'/uploads/'.$model->file_id.'/'.$fileModel->file_name.$fileModel->extension); ?>
                        <div class="span12 well well-large">
                            <?php
                            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $profile->profile_picture;
                            if ((is_file($filePath)) && (file_exists($filePath))) {
                                echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $profile->profile_picture, 'Profile Picture', array('alt' => User::getName($profile->user_id), 'class' => 'span12 thumbnail', 'title' => User::getName($profile->user_id), 'style' => ''));
                            }
                            ?>
                            <div class="clearfix"></div>
                            <div class="alert alert-success">
                                <?php echo $form->fileFieldControlGroup($profile, 'profile_picture', array('class' => 'span12', 'maxlength' => 255)); ?>
                            </div>

                        </div>                                               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="preference" class="tab-pane fade">
        <div class="well">                   
            <?php if ($sub->status == 1): ?>
                <h2 class="alert alert-success">Subscription Status</h2>

                <?php
                /*
                  $this->widget('yiiwheels.widgets.select2.WhSelect2', array(
                  'model' => $subscription,
                  'attribute' => 'categories',
                  'data' => CHtml::listData(NewsCategory::model()->findAll(array('condition' => 'parent_id IN (14,15,16) and published=1', "order" => "ordering asc")), 'id', 'title'),
                  'htmlOptions' => array('multiple' => 'multiple', 'class' => 'span6', 'style' => 'height: 550px;'),
                  'pluginOptions' => array(
                  'placeholder' => 'type 2amigos',
                  'width' => '40%',
                  'maximumSelectionSize' => Package::get_no_of_cat(),
                  )
                  ));
                 */
                ?>
                <div class="well">
                    <h5 class="alert alert-info span5">Please, choose <?php echo Package::get_no_of_cat(); ?> news categories.</h5>
                    <div class="clearfix"></div>
                    <?php echo $form->DropDownListControlGroup($subscription, 'categories', CHtml::listData(NewsCategory::model()->findAll(array('condition' => 'parent_id IN (14,15,16) and published=1', "order" => "ordering asc")), 'id', 'title'), array('multiple' => 'multiple', 'class' => 'span6', 'style' => 'height: 500px;')); ?>
                </div>
            <?php else: ?>
                <?php echo $form->hiddenField($subscription, 'id'); ?>
                <h2 class="alert alert-danger">You are not subscribed yet!</h2>
                <h3 class="alert alert-info">Please, check out our <?php echo CHtml::link('subscription packages', array('package/group'), array('class' => '')) ?></h3> 
            <?php endif; ?>
        </div>              
    </div>
</div>
<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain')),
    TbHtml::resetButton('reset', array('color' => TbHtml::BUTTON_COLOR_INVERSE, 'size' => TbHtml::BUTTON_SIZE_LARGE, 'class' => 'btn-plain')),
));
?>
<?php $this->endWidget(); ?>