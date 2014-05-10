<li class="span4">
    <div class="thumbnail">
        <div class="caption">
            <p>&nbsp;</p>
            <br />

            <p>
                <b><?php echo CHtml::encode($data->getAttributeLabel('writter')); ?>:</b>
                <?php echo CHtml::encode($data->writter); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('publication')); ?>:</b>
                <?php echo CHtml::encode($data->publication); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('published_time')); ?>:</b>
                <?php echo CHtml::encode($data->published_time); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
                <?php echo CHtml::encode($data->price); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('pages')); ?>:</b>
                <?php echo CHtml::encode($data->pages); ?>
                <br />
            </p>
            <br />            
            <?php echo CHtml::link(CHtml::encode('View details'), array('view', 'id' => $data->id), array('class' => 'btn btn-success btn-plain')); ?>          
        </div>

        <?php echo CHtml::image(Yii::app()->baseUrl . "/uploads/books/" . $data->cover_image, "Cover Image", array('class' => '', 'style' => 'border-radius: 5px 5px 0 0;')); ?>

        <h4 class="text-center alert alert-info no-margin" style = "border-radius: 0 0 5px 5px;"><?php echo CHtml::encode($data->title); ?></h4>

    </div>
</li>   


