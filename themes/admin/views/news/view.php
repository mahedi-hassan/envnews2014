<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs = array(
    'News' => array('admin'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
$this->pageTitle = Yii::app()->name . ' - News Post';
$this->heading = '<i class="fa fa-edit"></i> View News Post';
//Get directory
$year = date('Y', strtotime($model->published_date));
$month = strtolower(date('m_F', strtotime($model->published_date)));
$day = strtolower(date('M_d', strtotime($model->published_date)));
?>

<h1><?php echo $model->title; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'alias',
        array(
            'name' => 'news_image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->baseUrl . '/images/envnews/' . $year . '/' . $month . '/' . $day . '/' . NewsSource::get_news_source($model->sorc_id) . '/' . $model->news_image, 'News Image', array('alt' => $model->title, 'class' => 'span6 thumbnail', 'title' => $model->title, 'style' => 'margin:0px 10px 10px 0px;')),
        ),
        array(
            'name' => 'introtext',
            'type' => 'raw',
            'value' => $model->introtext,
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        array(
            'name' => 'state',
            'value' => $model->state ? "Yes" : "No",
        ),
        array(
            'name' => 'cat_id',
            'type' => 'raw',
            'value' => getNewsCategoryName($model->cat_id),
        ),
        array(
            'name' => 'sorc_id',
            'type' => 'raw',
            'value' => getSourceName($model->sorc_id),
        ),
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'value' => getUserName($model->created_by),
        ),
        array(
            'name' => 'created_date',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->created_date)),
        ),
        array(
            'name' => 'modified_by',
            'type' => 'raw',
            'value' => getUserName($model->modified_by),
        ),
        array(
            'name' => 'modified_date',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->modified_date)),
        ),
        array(
            'name' => 'published_date',
            'type' => 'raw',
            'value' => date("F j, Y, g:i A", strtotime($model->published_date)),
        ),
        'ordering',
        'metakey',
        'metadesc',
        'hits',
        array(
            'name' => 'featured',
            'value' => $model->featured ? "Yes" : "No",
        ),
    ),
));

function getUserName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('name')
            ->from('{{user_admin}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}

function getNewsCategoryName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{news_category}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();
    if ($returnValue <= '0') {
        $returnValue = 'No parent!';
    } else {
        $returnValue = $returnValue;
    }
    return $returnValue;
}

function getSourceName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('title')
            ->from('{{news_source}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>