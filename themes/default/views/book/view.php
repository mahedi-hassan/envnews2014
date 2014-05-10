<?php
/* @var $this BookController */
/* @var $model Book */
?>

<?php
$this->breadcrumbs = array(
    'Books' => array('index'),
    $model->title,
);
?>
<div class="row-fluid">
    <div class="span9">
        <div class="well well-large">
            <h1 class="alert alert-success"><?php echo $model->title; ?></h1>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span8 thumbnail pull-left">
                                <h4 class="alert alert-info">Book info</h4>
                                <table class="table table-condensed table-bordered" style="margin-bottom: 10px !important;">
                                    <tbody>
                                        <tr class="success">
                                            <td style="width: 118px;"><b>Book Name</b></td>
                                            <td><?php echo CHtml::encode($model->title); ?></td>
                                        </tr>
                                        <tr class="info">
                                            <td><b>Writer</b></td>
                                            <td><?php echo CHtml::encode($model->writter); ?></td>
                                        </tr>
                                        <tr class="success">
                                            <td><b>Publication</b></td>
                                            <td><?php echo CHtml::encode($model->publication); ?></td>
                                        </tr>
                                        <tr class="info">
                                            <td><b>Published year</b></td>
                                            <td><?php echo CHtml::encode($model->published_time); ?></td>
                                        </tr>
                                        <tr class="success">
                                            <td><b>Pages</b></td>
                                            <td><?php echo CHtml::encode($model->pages); ?></td>
                                        </tr>
                                        <tr class="info">
                                            <td><b>Price</b></td>
                                            <td><?php echo CHtml::encode($model->price); ?></td>
                                        </tr>
                                    </tbody>
                                </table>                                    
                            </div>
                    <div class="span4 pull-right thumbnail ">
                        <?php echo CHtml::image(Yii::app()->baseUrl . "/uploads/books/" . $model->cover_image, "Cover Image", array('class' => 'img-rounded', 'style' => '')); ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br />
                    <div class="well">
                        <?php echo $model->description; ?>
                    </div>
            </div>
            </div>
    </div>
    <div class="span3">

    </div>
</div>