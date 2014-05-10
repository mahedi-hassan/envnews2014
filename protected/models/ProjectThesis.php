<?php

/**
 * This is the model class for table "{{project_thesis}}".
 *
 * The followings are the available columns in table '{{project_thesis}}':
 * @property string $id
 * @property string $title
 * @property string $abstract
 * @property string $methodology
 * @property string $result
 * @property string $conclusion
 * @property string $s_name
 * @property string $s_email
 * @property string $s_contact
 * @property integer $s_department
 * @property integer $s_university
 * @property integer $s_submission_date
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 * @property integer $status
 */
class ProjectThesis extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProjectThesis the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{project_thesis}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, abstract, s_name, s_department, s_university,', 'required'),
            array('s_department, s_university, created_by, modified_by, status', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 250),
            array('s_name', 'length', 'max' => 150),
            array('s_email', 'length', 'max' => 100),
            array('s_contact', 'length', 'max' => 50),
            array('abstract, methodology, result, conclusion, modified_on, s_submission_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, abstract, methodology, result, conclusion, s_name, s_email, s_contact, s_department, s_university, s_submission_date, created_on, created_by, modified_on, modified_by, status', 'safe', 'on' => 'search'),
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
            'abstract' => 'Abstract',
            'methodology' => 'Methodology',
            'result' => 'Result',
            'conclusion' => 'Conclusion',
            's_name' => 'Name',
            's_email' => 'Email',
            's_contact' => 'Contact',
            's_department' => 'Department',
            's_university' => 'University',
            's_submission_date' => 'Submission date',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
            'status' => 'Status',
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
        $criteria->compare('abstract', $this->abstract, true);
        $criteria->compare('methodology', $this->methodology, true);
        $criteria->compare('result', $this->result, true);
        $criteria->compare('conclusion', $this->conclusion, true);
        $criteria->compare('s_name', $this->s_name, true);
        $criteria->compare('s_email', $this->s_email, true);
        $criteria->compare('s_contact', $this->s_contact, true);
        $criteria->compare('s_department', $this->s_department);
        $criteria->compare('s_university', $this->s_university);
        $criteria->compare('s_submission_date', $this->s_submission_date, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}