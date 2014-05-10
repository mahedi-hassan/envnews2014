<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->name,
);
?>
<div class="row-fluid">

    <div class="well">
        <div class="row-fluid">
            <div class="span10">
                <h3>Hello <span style="color: #008899; font-size: 30px;"><?php echo $model->name; ?></span></h3>
                <h4 style="color: #008800;">Welcome to Envnews</h4>
            </div>


            <div class="span2">
                <?php
                $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $profile->profile_picture;
                if ((is_file($filePath)) && (file_exists($filePath))) {
                    echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $profile->profile_picture, 'Profile Picture', array('alt' => User::getName($profile->user_id), 'class' => 'img-polaroid pull-right', 'title' => User::getName($profile->user_id), 'style' => 'height:85px;'));
                } else {
                    echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . 'user_icons_male.jpg', 'Profile Picture', array('alt' => User::getName($profile->user_id), 'class' => 'img-polaroid pull-right', 'title' => User::getName($profile->user_id), 'style' => 'height:85px;'));
                }
                ?>
            </div>
        </div>
    </div>    
    <div class="well user_profile">
        <div class="row-fluid">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Profile Home</a></li>
                <li><a href="#subscription" data-toggle="tab">Subscription status</a></li>
                <li><a href="#messages" data-toggle="tab">Messages</a></li>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="profile">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span4 well">
                                <?php
                                $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $profile->profile_picture;
                                if ((is_file($filePath)) && (file_exists($filePath))) {
                                    echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $profile->profile_picture, 'Profile Picture', array('alt' => User::getName($profile->user_id), 'class' => '', 'title' => User::getName($profile->user_id), 'style' => 'border: 1px solid rgba(0, 0, 0, 0.2); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);'));
                                } else {
                                    echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . 'user_icons_male.jpg', 'Profile Picture', array('alt' => User::getName($profile->user_id), 'class' => '', 'title' => User::getName($profile->user_id), 'style' => 'border: 1px solid rgba(0, 0, 0, 0.2); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);'));
                                }
                                ?>
                                <h3 class="alert alert-success"><?php echo CHtml::encode($model->name); ?></h3>
                                <table class="table table-striped table-condensed">                                        
                                    <tr class="even">
                                        <th>Username</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->username); ?></td>
                                    </tr>
                                    <tr class="odd">
                                        <th>Email</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->email); ?></td>
                                    </tr>
                                    <tr class="even">
                                        <th>Register Date</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->registerDate); ?></td>
                                    </tr>
                                    <tr class="odd">
                                        <th>Lastvisit Date</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->lastvisitDate); ?></td>
                                    </tr>
                                </table>
                            </div>                            
                            <div class="span8 well">
                                <h3 class="alert alert-success"><?php echo CHtml::encode($model->name); ?><?php echo CHtml::link('Edit profile', array('user/update', 'id' => Yii::app()->user->id), array('class' => 'pull-right btn btn-large btn-success btn-plain')); ?></h3>
                                <table class="table table-striped table-condensed">                                        
                                    <tr class="even">
                                        <th>Username</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->username); ?></td>
                                    </tr>
                                    <tr class="odd">
                                        <th>Email</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->email); ?></td>
                                    </tr>
                                    <tr class="even">
                                        <th>Register Date</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->registerDate); ?></td>
                                    </tr>
                                    <tr class="odd">
                                        <th>Lastvisit Date</th>
                                        <td><?php echo ': &nbsp;' . CHtml::encode($model->lastvisitDate); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>                        
                    </div>
                </div>

                <div class="tab-pane fade" id="subscription">
                    <div class="well">
                        <?php
                        $sub = Subscription::model()->findByAttributes(array('user_id' => $model->id));
                        ?>
                        <?php if ($sub->status == 1): ?>
                            <h1 class="alert alert-success">Subscription Status</h1>
                            <div class="row-fluid">
                                <div class="span6 well">
                                    <h4 class="alert alert-info">User info</h4>
                                    <table class="table table-striped table-condensed">                                        
                                        <tr class="even">
                                            <th>Name</th>
                                            <td><?php echo ': &nbsp;' . CHtml::encode($model->name); ?></td>
                                        </tr>
                                        <tr class="odd">
                                            <th>Subscription</th>
                                            <td><?php echo ': &nbsp;' . Package::getPackageName($subscription->package_id); ?></td>
                                        </tr>
                                        <tr class="even">
                                            <th>Package</th>
                                            <td><?php echo ': &nbsp;' . Package::getPackageGroupName($subscription->subscription_type); ?></td>
                                        </tr>                                    
                                    </table>
                                </div>
                                <div class="span6 well">                               
                                    <h4 class="alert alert-info">Selected Categories for News Feed</h4>
                                    <?php
                                    foreach ($subscription->categories as $category) {
                                        if (NewsCategory::getNewsCategoryName($category) == "No parent!") {
                                            echo '<h4 class = "alert alert-warning">No Category selected! Please, ' . CHtml::link('select category', array('user/update', 'id' => yii::app()->user->id, '#' =>'preference'), array('class' => '')) . '</h3>';
                                        } else {
                                            echo '<h3 class = "alert alert-warning"><i class="fa fa-check text-success"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span class= "text-success">' . NewsCategory::getNewsCategoryName($category) . '</span></h3>';
                                        }
                                    }
                                    ?>
                                </div>

                            </div>

                        <?php else: ?>
                            <h2 class="alert alert-danger">You are not subscribed yet!</h2>
                            <h3 class="alert alert-info">Please, check out our <?php echo CHtml::link('subscription packages', array('package/group'), array('class' => '')) ?></h3> 
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="messages">
                    <div class="well">
                        <h2 class="alert alert-block">This section is currently under-development</h2>
                    </div>
                </div>
                <div class="tab-pane fade" id="settings">
                    <div class="well">
                        <h2 class="alert alert-block">This section is currently under-development</h2>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>


