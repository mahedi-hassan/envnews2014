<div class="span4 plan">
    <div class="plan-name-silver">
        <h2><?php echo CHtml::encode($data->title); ?></h2>
        <span>$0.00 / Month</span>
    </div>
    <ul>
        <li class="plan-feature">1 Account</li>
        <li class="plan-feature">1 Category</li>
        <li class="plan-feature">Access all News archive</li>
        <li class="plan-feature">Access all publication</li>
        <li class="plan-feature">Daily News-feed</li>
        <li class="plan-feature">Weekly Reports</li>
        <li class="plan-feature">Monthly Newsletter</li>
        <li class="plan-feature"><?php echo CHtml::link('Select', array('package/index', 'id' => $data->id), array('class' => 'btn btn-primary btn-block btn-plain')) ?></li>
    </ul>
</div>