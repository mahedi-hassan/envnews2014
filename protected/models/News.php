<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $introtext
 * @property integer $state
 * @property string $cat_id
 * @property integer $sorc_id
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property string $Published_date
 * @property integer $ordering
 * @property string $hits
 * @property integer $featured
 * @property string $metakey
 * @property string $metadesc
 */
class News extends CActiveRecord {

    public $file;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{news}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, introtext, cat_id, sorc_id, state,published_date', 'required'),
            array('state, sorc_id, ordering, featured', 'numerical', 'integerOnly' => true),
            array('title, alias, news_image, image_caption, writter, sub_title', 'length', 'max' => 255),
            array('cat_id', 'length', 'max' => 11),
            array('news_image', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            array('sorc_id, created_by, modified_by, hits', 'length', 'max' => 10),
            array('created_date, modified_date, published_date', 'safe'),
            array('file', 'file', 'types' => 'jpg, jpeg, gif, png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 500KB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, alias, introtext, state, cat_id, sorc_id, created_by, modified_by, created_date, modified_date, published_date, ordering, hits, featured, metakey, metadesc, image_caption, writter, sub_title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'introtext' => 'Introtext',
            'state' => 'Published',
            'cat_id' => 'Category',
            'sorc_id' => 'News Source',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
            'published_date' => 'Published Date',
            'ordering' => 'Ordering',
            'hits' => 'Hits',
            'featured' => 'Featured',
            'metakey' => 'Metakey',
            'metadesc' => 'Metadesc',
            'image_caption' => 'Image Caption',
            'writter' => 'Reporter',
            'sub_title' => 'Sub Heading',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('introtext', $this->introtext, true);
        $criteria->compare('state', $this->state);
        $criteria->compare('cat_id', $this->cat_id, true);
        $criteria->compare('sorc_id', $this->sorc_id);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('modified_date', $this->modified_date, true);
        $criteria->compare('published_date', $this->published_date, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('hits', $this->hits, true);
        $criteria->compare('featured', $this->featured);
        $criteria->compare('metakey', $this->metakey, true);
        $criteria->compare('metadesc', $this->metadesc, true);
        $criteria->compare('image_caption', $this->image_caption, true);
        $criteria->compare('writter', $this->writter, true);
        $criteria->compare('sub_title', $this->sub_title, true);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array('defaultOrder' => 'published_date DESC, id DESC')
        ));
    }

    public function search_category($cat_id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        $criteria->condition = 't.cat_id=' . $cat_id;

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.alias', $this->alias, true);
        $criteria->compare('t.introtext', $this->introtext, true);
        $criteria->compare('t.state', $this->state);
        $criteria->compare('t.cat_id', $this->cat_id, true);
        $criteria->compare('t.sorc_id', $this->sorc_id);
        $criteria->compare('t.created_by', $this->created_by, true);
        $criteria->compare('t.created_date', $this->created_date, true);
        $criteria->compare('t.modified_by', $this->modified_by, true);
        $criteria->compare('t.modified_date', $this->modified_date, true);
        $criteria->compare('t.published_date', $this->published_date, true);
        $criteria->compare('t.ordering', $this->ordering);
        $criteria->compare('t.hits', $this->hits, true);
        $criteria->compare('t.featured', $this->featured);
        $criteria->compare('t.metakey', $this->metakey, true);
        $criteria->compare('t.metadesc', $this->metadesc, true);
        $criteria->compare('t.image_caption', $this->image_caption, true);
        $criteria->compare('t.writter', $this->writter, true);
        $criteria->compare('t.sub_title', $this->sub_title, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array('defaultOrder' => 't.published_date DESC, t.id DESC')
        ));
    }

}