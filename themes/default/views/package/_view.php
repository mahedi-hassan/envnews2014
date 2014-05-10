<?php
    $user_id = yii::app()->user->id;
    $subs = Subscription::model()->findByAttributes(array('user_id' => $user_id,));
    //print_r($subs);
    //exit();
?>
<?php if ($data->group_id == 1): ?>
    <div class="span4 plan">
        <div class="plan-name-package">
            <h2><?php echo CHtml::encode($data->package_name); ?></h2>
            <span>$<?php echo CHtml::encode($data->regular_price); ?> / Month</span>
        </div>
        <ul>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?> : </b>
                <?php echo Package::getPackageGroupName($data->group_id); ?>
            </li>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('package_name')); ?> : </b>
                <?php echo CHtml::encode($data->package_name); ?>
            </li>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('regular_price')); ?> : </b>
                <?php echo CHtml::encode($data->regular_price); ?>
            </li>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('regular_price')); ?> : </b>
                <?php echo CHtml::encode($data->regular_price); ?>
            </li>
            <li class="plan-feature">1 Account</li>
            <li class="plan-feature">1 Category</li>
            <li class="plan-feature">Access all News archive</li>
            <li class="plan-feature">Access all publication</li>
            <li class="plan-feature">Daily News-feed</li>
            <li class="plan-feature">Weekly Reports</li>
            <li class="plan-feature">Monthly Newsletter</li>
            <li class="plan-feature"><?php echo CHtml::link('Get Now', array('subscription/subscribe', 'id' => $subs->id, 'package_id' => $data->id, 'package_group' => $data->group_id), array('class' => 'btn btn-success btn-block btn-plain')) ?></li>
        </ul>
    </div>
<?php else: ?>
    <div class="span3 plan">
        <div class="plan-name-package">
            <h2><?php echo CHtml::encode($data->package_name); ?></h2>
            <span>$<?php echo CHtml::encode($data->regular_price); ?> / Month</span>
        </div>
        <ul>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?> : </b>
                <?php echo Package::getPackageGroupName($data->group_id); ?>
            </li>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('package_name')); ?> : </b>
                <?php echo CHtml::encode($data->package_name); ?>
            </li>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('regular_price')); ?> : </b>
                <?php echo CHtml::encode($data->regular_price); ?>
            </li>
            <li class="plan-feature">
                <b><?php echo CHtml::encode($data->getAttributeLabel('regular_price')); ?> : </b>
                <?php echo CHtml::encode($data->regular_price); ?>
            </li>
            <li class="plan-feature">1 Account</li>
            <li class="plan-feature">1 Category</li>
            <li class="plan-feature">Access all News archive</li>
            <li class="plan-feature">Access all publication</li>
            <li class="plan-feature">Daily News-feed</li>
            <li class="plan-feature">Weekly Reports</li>
            <li class="plan-feature">Monthly Newsletter</li>
            <li class="plan-feature"><?php echo CHtml::link('Buy Now', array('subscription/subscribe', 'id' => $subs->id, "package_id"=> $data->id, 'package_group' => $data->group_id), array('class' => 'btn btn-success btn-block btn-plain')) ?></li>
            
        </ul>
    </div>
<?php endif; ?>