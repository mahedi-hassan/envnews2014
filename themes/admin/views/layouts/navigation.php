<!-- BEGIN HEADER.head -->
<header id="top">
    <?php
    $this->widget('bootstrap.widgets.TbNavbar', array(
        'color' => TbHtml::NAVBAR_COLOR_INVERSE,
        'brandLabel' => Yii::app()->name,
        'brandUrl' => array('/site/index'),
        'display' => TbHtml::NAVBAR_DISPLAY_NONE,
        'collapse' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'items' => array(
                    array('label' => 'Users', 'icon' => 'icon-user', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                            array('label' => 'Admin User', 'icon' => 'icon-play', 'url' => array('/userAdmin/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Site User', 'icon' => 'icon-play', 'url' => array('/user/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Subscription', 'icon' => 'icon-align-left', 'url' => array('/subscription/admin'), 'visible' => !Yii::app()->user->isGuest),
                        )),
                    array('label' => 'System Tools', 'icon' => 'icon-signal', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                            array('label' => 'Visitor Statistics', 'icon' => 'icon-align-left', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                    array('label' => 'Admin Visitor Statistics', 'icon' => 'icon-folder-open', 'url' => array('/visitor/admin'), 'visible' => !Yii::app()->user->isGuest),
                                    array('label' => 'User Visitor Statistics', 'icon' => 'icon-folder-open', 'url' => array('/visitor/user'), 'visible' => !Yii::app()->user->isGuest),
                                )),
                            array('label' => 'Audit Trail', 'icon' => 'icon-align-left', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                    array('label' => 'Admin Audit Trail', 'icon' => 'icon-folder-open', 'url' => array('/auditTrail/admin'), 'visible' => !Yii::app()->user->isGuest),
                                    array('label' => 'User Audit Trail', 'icon' => 'icon-folder-open', 'url' => array('/auditTrail/user'), 'visible' => !Yii::app()->user->isGuest),
                                )),
                            array('label' => 'Online User', 'icon' => 'icon-align-left', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                    array('label' => 'Admin Online User', 'icon' => 'icon-folder-open', 'url' => array('/onlineUser/admin'), 'visible' => !Yii::app()->user->isGuest),
                                    array('label' => 'User Online User', 'icon' => 'icon-folder-open', 'url' => array('/onlineUser/user'), 'visible' => !Yii::app()->user->isGuest),
                                )),
                            array('label' => 'Message', 'icon' => 'icon-align-left', 'url' => array('/message/admin'), 'visible' => !Yii::app()->user->isGuest),
                        )),
                    array('label' => 'Settings', 'icon' => 'cog', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                            array('label' => 'Country', 'icon' => 'icon-play', 'url' => array('/country/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'State', 'icon' => 'icon-play', 'url' => array('/state/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'City', 'icon' => 'icon-play', 'url' => array('/city/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Currency', 'icon' => 'icon-play', 'url' => array('/currency/admin'), 'visible' => !Yii::app()->user->isGuest),
                            '---',
                            array('label' => 'User Group', 'icon' => 'icon-play', 'url' => array('/userGroup/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'User Status', 'icon' => 'icon-play', 'url' => array('/userStatus/admin'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'ACL Controllers', 'icon' => 'icon-lock', 'url' => array('/aclController/admin'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' => 'ACL Actions', 'icon' => 'icon-lock', 'url' => array('/aclAction/admin'), 'visible' => !Yii::app()->user->isGuest),
                        //array('label' => 'ACL', 'icon' => 'icon-lock', 'url' => array('/acl/admin'), 'visible' => !Yii::app()->user->isGuest),
                        )),
                ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => Yii::app()->user->name, 'icon' => 'icon-user', 'url' => '#', 'items' => array(
                            array('label' => 'Profile Edit', 'icon' => 'icon-edit', 'url' => array('/userAdmin/update', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Change Password', 'icon' => 'icon-refresh', 'url' => array('/userAdmin/edit', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                            '---',
                            array('label' => 'Login', 'icon' => 'icon-ok', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'icon-off', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                        )),
                ),
            ),
        ),
    ));
    ?>
    <div class="head">
        <div class="search-bar">
            <div class="row-fluid">
                <div class="span12">
                    <div class="search-bar-inner">
                        <a id="menu-toggle" href="#menu" data-toggle="collapse"
                           class="accordion-toggle btn btn-inverse visible-phone"
                           rel="tooltip" data-placement="bottom" data-original-title="Show/Hide Menu">
                            <i class="icon-sort"></i>
                        </a>
                        <form class="main-search">
                            <input class="input-block-level" type="text" placeholder="Live search...">
                            <button id="searchBtn" type="submit" class="btn btn-inverse"><i class="icon-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ."main-bar -->
        <div class="main-bar">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <h3><?php echo $this->heading; ?></h3>
                    </div>

                    <div class="span6">
                        <?php
                        $this->widget('bootstrap.widgets.TbNav', array(
                            'type' => 'pills',
                            'stacked' => false,
                            'items' => $this->menu,
                            'htmlOptions' => array('class' => 'pull-right'),
                        ));
                        ?>
                    </div>                            
                </div>
                <!-- /.row-fluid -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.main-bar -->
    </div>
    <div class="push_offset"></div> 
</header>
<!-- END HEADER.head --> 

