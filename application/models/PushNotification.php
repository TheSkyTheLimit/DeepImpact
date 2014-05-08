<?php

/**
 * This is the model class for table "push_notification".
 *
 * The followings are the available columns in table 'push_notification':
 * @property integer $pushID
 * @property integer $companyID
 * @property string $startDate
 * @property string $endDate
 * @property string $pushURL
 * @property string $pushData
 * @property integer $isDeleted
 * @property integer $userCreated
 * @property string $createdDate
 */
class PushNotification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'push_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pushID, companyID, isDeleted, userCreated', 'numerical', 'integerOnly'=>true),
			array('startDate, endDate, pushURL, pushData, createdDate', 'safe'),
			// The following rule is used by search().
			array('startDate, createdDate','default','value'=>new CDbExpression('NOW()')),
			array('endDate','default','value'=>new CDbExpression('DATE_ADD(startDate , INTERVAL 7 day)')),
			// @todo Please remove those attributes that should not be searched.		
			array('pushID, companyID, startDate, endDate, pushURL, pushData, isDeleted, userCreated, createdDate', 'safe', 'on'=>'search'),
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
			'pushID' => 'Push ID',
			'companyID' => 'Company',
			'startDate' => 'Start Date',
			'endDate' => 'Expire Date',
			'pushURL' => 'Push Url',
			'pushData' => 'Note',
			'isDeleted' => 'Is Deleted',
			'userCreated' => 'User Created',
			'createdDate' => 'Created Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('pushID',$this->pushID,true);
		$criteria->compare('companyID',$this->companyID);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('pushURL',$this->pushURL,true);
		$criteria->compare('pushData',$this->pushData,true);
		$criteria->compare('isDeleted',0);
		$criteria->compare('userCreated',$this->userCreated);
		$criteria->compare('createdDate',$this->createdDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PushNotification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
