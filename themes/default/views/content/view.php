<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
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
<fieldset>
    <legend><?php echo $model->title; ?></legend>
    <div class="row-fluid">    
        <div class="span12">
            <?php echo $model->introtext; ?>
        </div>
    </div> 
    <div class="row-fluid">    
        <div class="span12">
            <div class="fb-comments" data-href="<?php echo 'http://www.envnews.org/' . Yii::app()->request->url; ?>" data-width="1170" data-num-posts="10"></div>
        </div>
    </div> 
</fieldset>
