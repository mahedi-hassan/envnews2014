<?php
$this->pageTitle = Yii::app()->name . ' | Environmental News Portal | Information is Power';
echo CHtml::image(Yii::app()->baseUrl . '/images/envnews_logo_new.png', Yii::app()->name, array('alt' => Yii::app()->name, 'width' => '350', 'height' => '160', 'title' => Yii::app()->name, 'style' => 'margin:25px 0px 70px 390px;'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/themes/default/js/bangla.js');
?>
<div class="row-fluid">
    <div class="span3"></div>
    <div class="span6">
        <div class="well">
            <div id="rssearch__hp" class="rssearch_box">
                <form id="frmSearch" class="form" accept-charset="utf-8">
                    <input type="hidden" value="com_rssearch" name="option">
                    <div class="input-prepend">
                        <input id="rsf_inp" type="text" style="width:445px" name="search">
                        <input type="submit" style="font-family:SolaimanLipi; color:#D60000; margin-left:5px; border:none; display: none;" name="sa" value="">
                        <button id="Search" class="btn btn-success" type="submit">Search</button>
                    </div>
                    <div style="margin: 0px; position: absolute; overflow: hidden; height: 0px; width: 350px;">
                        <div id="search_suggest" class="suggestions" style="width: 350px; height: auto; margin: 0px; overflow: hidden;"></div>
                    </div>
                    <input type="hidden" value="results" name="view">
                    <input type="hidden" value="default" name="layout">
                    <input type="hidden" value="215" name="module_id">
                    <div class="unicode_font">
                        <span>
                            <input type="radio" checked="" name="layoutGrp" onclick="switched = true;" value="english">
                        </span>
                        <span> English</span>
                        <span>
                            <input type="radio" name="layoutGrp" onclick="makeUnijoyEditor('rsf_inp');
                                    switched = false;" value="unijoy">
                        </span>
                        <span> ইউনিজয়</span>
                        <span>
                            <input type="radio" name="layoutGrp" onclick="makePhoneticEditor('rsf_inp');
                                    switched = false;" value="phonetic">
                        </span>
                        <span> ফনেটিক</span>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="span3"></div>
    <?php /*<div class="span12" style="margin-left: 0;">
        <div id="dim">

            <div id="layerslider" style="width: 99%;">

                <div class="ls-layer" rel="slidedelay: 3000">
                    <img class="ls-bg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l1.jpg" alt="layer" style="width: 100%;">
                    <img class="ls-s2" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l11.png" alt="sublayer" style="durationin: 2000; easingin: easeOutExpo; slidedirection: top; delayin: 1000">
                    <img class="ls-s3" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l12.png" alt="sublayer" rel="durationin: 2300; easingin: easeOutElastic; slidedirection: bottom; delayin: 1000">
                    <img id="leaf1" class="ls-s4" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l13.png" alt="sublayer" rel="slidedirection: left">
                    <img class="ls-s5" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l15.png" alt="sublayer" rel="slidedirection: top">
                    <img class="ls-s6" style="left: 240px; top: 200px;" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l14.png" alt="sublayer" rel="slidedirection: top">
                    <img id="leaf2" class="ls-s7" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l16.png" alt="sublayer" rel="slidedirection: bottom">
                    <img id="leaf3" class="ls-s2" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l17.png" alt="sublayer" rel="slidedirection: top">
                </div>

                <div class="ls-layer">
                    <img class="ls-bg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l3.jpg" alt="layer" style="width: 100%;">
                    <img class="ls-s2" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l31.png" alt="sublayer" rel="durationin: 5800; easingin: easeOutQuad">
                    <img class="ls-s3" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l32.png" alt="sublayer" rel="durationin: 5600; easingin: easeOutQuad">
                    <img class="ls-s5" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l33.png" alt="sublayer" rel="durationin: 1200">
                    <img class="ls-s5" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l34.png" alt="sublayer" rel="durationin: 1350">
                    <img class="ls-s6" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l36.png" alt="sublayer" rel="durationin: 4000; easingin: easeOutExpo; durationout: 800; delayout: 50">
                    <img class="ls-s7" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l35.png" alt="sublayer" rel="durationin: 5000; easingin: easeOutExpo; durationout: 800; delayout: 100">
                    <img class="ls-s8" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l37.png" alt="sublayer">
                    <img class="ls-s9" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l38.png" alt="sublayer">
                    <img class="ls-s10" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l39.png" alt="sublayer">
                    <img class="ls-s11" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l310.png" alt="sublayer">
                    <img class="ls-s12" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l311.png" alt="sublayer">
                </div>

                <div class="ls-layer" rel="slidedirection: top; slidedelay: 6000">
                    <img class="ls-bg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l2.jpg" alt="layer" style="width: 100%;">
                    <img id="clouds" class="ls-s2" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l21.png" alt="sublayer">
                    <img class="ls-s3" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l22.png" alt="sublayer">
                    <img class="ls-s4" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l23.png" alt="sublayer">
                    <img class="ls-s5" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l24.png" alt="sublayer">
                    <img class="ls-s6" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l25.png" alt="sublayer">
                    <img class="ls-s7" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l26.png" alt="sublayer">
                    <img class="ls-s8" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l27.png" alt="sublayer">
                    <img class="ls-s9" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l28.png" alt="sublayer">
                    <img class="ls-s10" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l29.png" alt="sublayer" rel="slidedirection: fade; durationin: 6000; easingin: easeOutExpo; delayin: 1500; delayout: 50">
                </div>

                <div class="ls-layer">

                    <img class="ls-bg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l4.jpg" alt="layer" style="width: 100%;">
                    <img class="ls-s6" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l45.png" alt="sublayer" style="durationin: 6000; easingin: easeOutQuart">
                    <img class="ls-s5" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l44.png" alt="sublayer" style="durationin: 3000; easingin: easeOutExpo">
                    <img class="ls-s2" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l41.png" alt="sublayer" style="delayin: 1400; easingin: easeOutBack">
                    <img class="ls-s3" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l42.png" alt="sublayer" style="delayin: 1400; easingin: easeOutBack">
                    <img class="ls-s4" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l43.png" alt="sublayer" style="delayin: 1400; easingin: easeOutBack">
                </div>

                <div class="ls-layer">
                    <img class="ls-bg" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l5.jpg" alt="layer" style="width: 100%;">
                    <img id="earth" class="ls-s3" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l51.jpg" alt="sublayer">
                    <img class="ls-s4" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l52.png" alt="sublayer">
                    <img class="ls-s6" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l53.png" alt="sublayer">
                    <img class="ls-s8" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/images/slider/l54.png" alt="sublayer">
                    <p id="l5text1" class="ls-s12">
                        2003 UB <span class="small">313</span>
                    </p>
                    <p id="l5text2" class="ls-s14">
                        Charon
                    </p>
                    <p id="l5text3" class="ls-s16">
                        Ceres
                    </p>
                </div>

            </div>

        </div>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/themes/default/js/jquery-easing-1.3.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/themes/default/js/layerslider_jquery_min.js'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/default/css/layerslider.css" />
        <script type="text/javascript">
            $(document).ready(function() {
                $('#layerslider').layerSlider({
                    skin: 'darkskin',
                    skinsPath: '<?php echo Yii::app()->request->baseUrl; ?>/themes/default/css/skins/'
                });
            });
        </script>
    </div> */?>
</div>