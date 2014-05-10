<?php
$this->pageTitle = Yii::app()->name . ' - '.$error['code'];
$this->breadcrumbs = array(
    'error',
);
?>
<div class="well well-large">
    <h1 class="alert alert-error"><?php echo $error['code'] ?></h1>
    <div class="well">
    <?php echo $error['message']; ?>
</div>
</div>