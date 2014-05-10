<?php

/**
 * This is the model class for table "{{yiisession}}".
 *
 * The followings are the available columns in table '{{yiisession}}':
 * @property string $id
 * @property integer $expire
 * @property string $data
 * @property integer $userId
 * @property integer $userType
 */
class Yiisession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Yiisession the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{yiisession}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('expire, userId, userType', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>32),
			array('data', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, expire, data, userId, userType', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'expire' => 'Expire',
			'data' => 'Data',
			'userId' => 'User',
			'userType' => 'User Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('expire',$this->expire);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('userType',$this->userType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}