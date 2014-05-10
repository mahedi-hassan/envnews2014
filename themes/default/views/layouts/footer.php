<footer class="footer">
    <div class="bottom">
        <div class="container" style="padding: 0px;">
            <div class="bottom_modules">
                <div class="row-fluid">
                    <div class="span3">                    
                        <div class="bottom_links">
                            <?php $this->get_news_cat_footer(14); ?>                       
                        </div>
                    </div>
                    <div class="span3">
                        <div class="bottom_links">
                            <?php $this->get_news_cat_footer(15); ?> 
                        </div>
                    </div>
                    <div class="span3">
                        <div class="bottom_links">
                            <?php $this->get_news_cat_footer(16); ?> 
                        </div>
                    </div>
                    <div class="span3">
                        <div class="bottom_links">
                            <?php $this->get_news_source_footer(); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer_offset"></div>
    <div class="credit">
        <div class="container" style="padding: 0px;">
            <div class="row-fluid">
                <div class="footer_menu">

                </div>
                <div class="copyright">
                    <div class="copyright_text">
                        <p>Copyright &copy; <?php echo date('Y'); ?> <?php echo Yii::app()->name; ?> . All Rights Reserved. <small>Developed by <a href="#">Idyllic Design</a> & <a href="#">Optimo Solutions</a> | Supported by <a href="#">WENA</a> & <a href="#">ERA society</a></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
