<div class="row-fluid" style="margin-bottom: 10px;">
    <div class="span12">     
        <div class="row-fluid">
            <div class="span12">
                <h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id), array('class' => 'thesis_title')); ?></h2>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="news_date">
                    <?php echo 'by <b>' . CHtml::encode($data->s_name) . '</b> | Added : ' . date("l, j F Y", strtotime(CHtml::encode($data->created_on))); ?>
                </div>                
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 text-justify">
                <?php echo '<div>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($data->abstract)), 800) . '...</div>'; ?>
            </div>
        </div>	
        <div class="row-fluid">
            <div class="span10"></div>
            <div class="span2">
                <?php echo CHtml::link(CHtml::encode('Read more...'), array('view', 'id' => $data->id), array('class' => 'read_more')); ?>
            </div>
            <div class="span12 no-margin">
                <hr style="margin: 0;">
            </div>
        </div>
    </div>
</div>