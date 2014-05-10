<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $this->get_category_name($model->cat_id) => array('/news/category', 'id' => $model->cat_id),
    $model->title,
);
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=669801819699879";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="row-fluid">    
    <div class="span9">
        <fieldset>
            <legend><?php echo $model->title; ?></legend>
            <div class="row-fluid"> 
                <div class="span4">
                    <?php echo '<strong>Category:</strong> ' . CHtml::link(CHtml::encode($this->get_category_name($model->cat_id)), array('/news/category', 'id' => $model->cat_id), array('class' => 'cat_source')); ?>
                </div>
                <div class="span4">
                    <div class="news_date"><?php echo date("l, j F Y, g:i A", strtotime(CHtml::encode($model->published_date))); ?></div>
                </div>
                <div class="span4">
                    <?php echo '<strong>Source:</strong> ' . CHtml::link(CHtml::encode(NewsSource::get_source_title($model->sorc_id)), array('/news/source', 'id' => $model->sorc_id), array('class' => 'cat_source')); ?>
                </div>
            </div> 
            <hr style="height: 10px;" />
            <div class="row-fluid">    
                <div class="span12">
                    <?php
                    //Get directory
                    $year = date('Y', strtotime($model->published_date));
                    $month = strtolower(date('m_F', strtotime($model->published_date)));
                    $day = strtolower(date('M_d', strtotime($model->published_date)));
                    $filePath = Yii::app()->basePath . '/../images/envnews/' . $year . '/' . $month . '/' . $day . '/' . NewsSource::get_news_source($model->sorc_id) . '/' . $model->news_image;
                    if ((is_file($filePath)) && (file_exists($filePath))) {
                        echo CHtml::image(Yii::app()->baseUrl . '/images/envnews/' . $year . '/' . $month . '/' . $day . '/' . NewsSource::get_news_source($model->sorc_id) . '/' . $model->news_image, 'News Image', array('alt' => $model->title, 'class' => 'span6 thumbnail', 'title' => $model->title, 'style' => 'margin:0px 10px 10px 0px;'));
                    }
                    ?>
                    <?php echo $model->introtext; ?>
                </div>
            </div>
        </fieldset>    
        <div class="row-fluid">    
            <div class="span12">
                <div class="fb-comments" data-href="<?php echo 'http://www.envnews.org/' . Yii::app()->request->url; ?>" data-width="870" data-num-posts="10"></div>
            </div>
        </div>        
    </div>
    <div class="span3">
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_news_latest($model->cat_id); ?>
            </div>
        </div>
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_news_popular($model->cat_id); ?>
            </div>
        </div>
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
        <div class="row-fluid">    
            <div class="span12">
                <?php $this->get_latest_news_thiscategory($model->cat_id); ?>
            </div>
        </div>               
    </div>
</div>