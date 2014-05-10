<?php $this->beginContent('//layouts/main'); ?>
<?php if (!Yii::app()->user->isGuest): ?>        
    <div id="push"></div>

    <!-- BEGIN LEFT  -->
    <div id="left">
        <!-- .user-media -->
        <div class="media user-media hidden-phone" id="fixed">
            <a href="" class="user-link">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user.gif" alt="" class="media-object img-polaroid user-img">
                <span class="label user-label">16</span>
            </a>

            <div class="media-body hidden-tablet">
                <h5 class="media-heading"><?php echo Yii::app()->user->getState('fullname'); ?></h5>
                <ul class="unstyled user-info">
                    <li>User Group : <br/>
                        <small><i class="icon-user-md"></i> <?php echo Yii::app()->user->getState('groupname'); ?></small>
                    </li>
                    <li>Last Access : <br/>
                        <small><i class="icon-calendar"></i> <?php echo Yii::app()->user->getState('lastvisit'); ?></small>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.user-media -->               

        <!-- BEGIN MAIN NAVIGATION -->
        <div id="sidemenu">
            <!--
            <ul id="menu" class="unstyled accordion collapse in">
                <li class="accordion-group active">
                    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#dashboard-nav">
                        <i class="fa fa-desktop"></i> Dashboard <span
                            class="label label-inverse pull-right">2</span>
                    </a>
                    <ul class="collapse in" id="dashboard-nav">
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-home"></i> Home Page', array('site/index')); ?>
                        </li>
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-barcode"></i> Statistics', array('')); ?>
                        </li>
                    </ul>
                </li>
                <li class="accordion-group ">
                    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-leaf icon-large"></i> News archive <span class="label label-inverse pull-right">3</span>
                    </a>
                    <ul class="collapse " id="component-nav">
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-credit-card"></i> News Post', array('news/admin')); ?>
                        </li>
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-inbox"></i> News Category', array('newsCategory/admin')); ?>
                        </li>
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-asterisk"></i> News Source', array('newsSource/admin')); ?>
                        </li>       
                    </ul>
                </li>
                <li class="accordion-group ">
                    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil icon-large"></i> Site Content <span class="label label-inverse pull-right">2</span>
                    </a>
                    <ul class="collapse " id="form-nav">
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-inbox"></i> Content Category', array('contentCategory/admin')); ?>
                        </li>
                        <li>
            <?php //echo CHtml::link('<i class="fa fa-qrcode"></i> Content Post', array('content/admin')); ?>
                        </li>                            
                    </ul>
                </li>                    
                <li class="accordion-group ">
                    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
                        <i class="icon-warning-sign icon-large"></i> Error Pages <span
                            class="label label-inverse pull-right">7</span>
                    </a>
                    <ul class="collapse" id="error-nav">
                        <li><a href="403.html"><i class="icon-angle-right"></i> 403</a></li>
                        <li><a href="404.html"><i class="icon-angle-right"></i> 404</a></li>
                        <li><a href="405.html"><i class="icon-angle-right"></i> 405</a></li>
                        <li><a href="500.html"><i class="icon-angle-right"></i> 500</a></li>
                        <li><a href="503.html"><i class="icon-angle-right"></i> 503</a></li>
                        <li><a href="offline.html"><i class="icon-angle-right"></i> offline</a></li>
                        <li><a href="countdown.html"><i class="icon-angle-right"></i> Under Construction</a></li>
                    </ul>
                </li>                    
            </ul> 
            -->
            <?php
            $this->widget('ext.menu.EMenu', array('items' => array(
                    array(
                        'name' => 'dashboard',
                        'link' => array('/site'),
                        'icon' => 'th',
                        'active' => 'site',
                        'sub' => array(
                            array(
                                'name' => 'Home Page',
                                'link' => array('/site/index'),
                                'icon' => 'th-list',
                            ),
                            array(
                                'name' => 'Statistics',
                                'link' => array('/site/statistics'),
                                'icon' => 'retweet',
                            ),
                        )),
                    array(
                        'name' => 'News Post',
                        'link' => array('/news'),
                        'icon' => 'th-large',
                        'active' => 'news',
                        'sub' => array(
                            array(
                                'name' => 'create News',
                                'link' => array('/news/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage News',
                                'link' => array('/news/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'News Category',
                        'link' => array('/newsCategory'),
                        'icon' => 'th-large',
                        'active' => 'newsCategory',
                        'sub' => array(
                            array(
                                'name' => 'create Category',
                                'link' => array('/newsCategory/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage N.Category',
                                'link' => array('/newsCategory/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'News Source',
                        'link' => array('/newsSource'),
                        'icon' => 'th',
                        'active' => 'newsSource',
                        'sub' => array(
                            array(
                                'name' => 'Create Source',
                                'link' => array('/newsSource/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Source',
                                'link' => array('/newsSource/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Content',
                        'link' => array('/content'),
                        'icon' => 'th',
                        'active' => 'content',
                        'sub' => array(
                            array(
                                'name' => 'Create Content',
                                'link' => array('/content/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Content',
                                'link' => array('/content/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Content Category',
                        'link' => array('/contentCategory'),
                        'icon' => 'th',
                        'active' => 'contentCategory',
                        'sub' => array(
                            array(
                                'name' => 'Create C.Category',
                                'link' => array('/contentCategory/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage C.Category',
                                'link' => array('/contentCategory/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Book',
                        'link' => array('/book'),
                        'icon' => 'th',
                        'active' => 'book',
                        'sub' => array(
                            array(
                                'name' => 'Add Book',
                                'link' => array('/book/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Book',
                                'link' => array('/book/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Magazine',
                        'link' => array('/magazine'),
                        'icon' => 'th',
                        'active' => 'magazine',
                        'sub' => array(
                            array(
                                'name' => 'Add Magazine',
                                'link' => array('/magazine/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Magazine',
                                'link' => array('/magazine/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Report',
                        'link' => array('/report'),
                        'icon' => 'th',
                        'active' => 'report',
                        'sub' => array(
                            array(
                                'name' => 'Add Report',
                                'link' => array('/report/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Report',
                                'link' => array('/report/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Project/Thesis',
                        'link' => array('/projectThesis'),
                        'icon' => 'th',
                        'active' => 'projectThesis',
                        'sub' => array(
                            array(
                                'name' => 'Add Project/Thesis',
                                'link' => array('/projectThesis/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Project/Thesis',
                                'link' => array('/projectThesis/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'Department',
                        'link' => array('/projectDepartment'),
                        'icon' => 'th',
                        'active' => 'projectDepartment',
                        'sub' => array(
                            array(
                                'name' => 'Add Department',
                                'link' => array('/projectDepartment/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage Department',
                                'link' => array('/projectDepartment/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                    array(
                        'name' => 'University',
                        'link' => array('/university'),
                        'icon' => 'th',
                        'active' => 'university',
                        'sub' => array(
                            array(
                                'name' => 'Add University',
                                'link' => array('/university/create'),
                                'icon' => 'plus-sign',
                            ),
                            array(
                                'name' => 'Manage University',
                                'link' => array('/university/admin'),
                                'icon' => 'th-list',
                            ),
                        )),
                )
            ));
            ?>
        </div>
        <!-- END MAIN NAVIGATION -->
        <div id="lb_offset"></div>
    </div>
    <!-- END LEFT -->        

<?php endif; ?>
<?php if (!Yii::app()->user->isGuest): ?>
    <!-- BEGIN MAIN CONTENT -->
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->                    
                <div class="span12 inner">
                    <div>

    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'homeLink' => CHtml::link('Dashboard', array('site/index')),
            'htmlOptions' => array('class' => 'breadcrumb')
        ));
        ?><!-- breadcrumbs -->
                        <?php endif ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbAlert', array(
                            'block' => true,
                            'fade' => true,
                            'closeText' => '&times;',
                        ));
                        ?>
                    </div>
                    <?php endif; ?>
                <!-- Include content pages -->
                <?php echo $content; ?>

                <?php if (!Yii::app()->user->isGuest): ?>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->
    </div>
    <!-- END CONTENT -->
<?php endif; ?>

<?php $this->endContent(); ?>

