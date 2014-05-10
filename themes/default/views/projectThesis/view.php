<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Project Thesises' => array('index'),
    $model->title,
);
?>
<div class="row-fluid">    
    <div class="span9">
        <div class="row-fluid">
            <div class="span12">                
                <fieldset>
                    <legend><?php echo CHtml::encode($model->title); ?></legend>             
                    <div class="row-fluid">                        
                        <div class="span12 text-justify well">
                            <div class="span6 thumbnail pull-right" style="position: relative; margin: 75px 0 15px 15px;">
                                <h4 class="alert alert-info">Student info</h4>
                                <table class="table table-condensed table-bordered">
                                    <tbody>
                                        <tr class="success">
                                            <td style="width: 118px;"><b>Student's Name</b></td>
                                            <td><?php echo CHtml::encode($model->s_name); ?></td>
                                        </tr>
                                        <tr class="info">
                                            <td><b>Email</b></td>
                                            <td><?php echo CHtml::encode($model->s_email); ?></td>
                                        </tr>
                                        <tr class="success">
                                            <td style="width: 110px;"><b>Contact no.</b></td>
                                            <td><?php echo CHtml::encode($model->s_contact); ?></td>
                                        </tr>
                                        <tr class="info">
                                            <td><b>Department</b></td>
                                            <td><?php echo CHtml::encode(getDepartmentName($model->s_department)); ?></td>
                                        </tr>
                                        <tr class="success">
                                            <td style="width: 110px;"><b>University</b></td>
                                            <td><?php echo CHtml::encode(getUniversityName($model->s_university)); ?></td>
                                        </tr>
                                        <tr class="info">
                                            <td><b>Submission Date</b></td>
                                            <td><?php echo date("l, j F Y", strtotime(CHtml::encode($model->s_submission_date))); ?></td>
                                        </tr>
                                    </tbody>
                                </table>                                    
                            </div>
                            <?php if (($model->abstract)): ?>
                                <?php echo '<h4 class="alert alert-success">Abstract</h4>' . $model->abstract; ?>                            
                            <?php endif ?>
                            <br />
                            <?php if (($model->methodology)): ?>
                                <?php echo '<h4 class="alert alert-success">Methodology</h4>' . $model->methodology; ?>
                            <?php endif ?>
                            <br />
                            <?php if (($model->result)): ?>
                                <?php echo '<h4 class="alert alert-success">Result</h4>' . $model->result; ?>
                            <?php endif ?>
                            <br />
                            <?php if (($model->conclusion)): ?>
                                <?php echo '<h4 class="alert alert-success">Conclusion</h4>' . $model->conclusion; ?>
                            <?php endif ?>
                            <br />
                        </div>
                    </div>
                </fieldset>                
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_news_source_list(); ?>
            </div>
        </div>
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_news_categories(); ?>
            </div>
        </div>                    
    </div>
</div>
<?php

function getDepartmentName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{project_department}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}

function getUniversityName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{university}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>