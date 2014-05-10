<div class="row-fluid" style="margin-bottom: 20px;">
    <div class="span12">        
        <div class="row-fluid">
            <div class="span12">
                <div class="news_date">
                    <?php echo date("l, j F Y, g:i A", strtotime(CHtml::encode($data->published_date))); ?>
                </div>                
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 cat_source">                
                <?php echo CHtml::link(CHtml::encode($this->get_category_name($data->cat_id)), array('view', 'id' => $data->id), array('class' => 'cat_source')); ?> | <?php echo CHtml::link(CHtml::encode(NewsSource::get_source_title($data->sorc_id)), array('view', 'id' => $data->id), array('class' => 'cat_source')); ?>
            </div>
        </div> 
        <div class="row-fluid">
            <div class="span12">
                <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id), array('class' => 'news_title')); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php echo '<div>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($data->introtext)), 1500) . '...</div>'; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span10"></div>
            <div class="span2">
                <?php echo CHtml::link(CHtml::encode('Read more...'), array('view', 'id' => $data->id), array('class' => 'read_more')); ?>
            </div>
        </div>
    </div>
</div>