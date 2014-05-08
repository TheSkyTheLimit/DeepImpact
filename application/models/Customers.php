<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property string $cusID
 * @property string $screenName
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property integer $isActive
 * @property string $email
 * @property string $officePhone
 * @property string $mobilePhone
 * @property string $facebook
 * @property string $instragram
 * @property string $tweeter
 * @property string $skype
 * @property string $line
 * @property string $preferredLang
 * @property string $imei
 * @property integer $isActivated
 * @property string $activatedDate
 * @property integer $isDeleted
 * @property string $deviceID
 * @property string $lastLogin
 * @property integer $deviceType
 * @property string $avatar
 */
class Customers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('isActive, isActivated, isDeleted, deviceType', 'numerical', 'integerOnly'=>true),
			array('screenName, firstName, lastName, email, facebook, instragram, tweeter, skype, line, imei, deviceID', 'length', 'max'=>250),
			array('password, preferredLang', 'length', 'max'=>50),
			array('officePhone, mobilePhone', 'length', 'max'=>20),
			array('activatedDate, lastLogin, avatar', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cusID, screenName, password, firstName, lastName, isActive, email, officePhone, mobilePhone, facebook, instragram, tweeter, skype, line, preferredLang, imei, isActivated, activatedDate, isDeleted, deviceID, lastLogin, deviceType, avatar', 'safe', 'on'=>'search'),
			array('lastLogin, activatedDate', 'default', 'setOnEmpty' => true, 'value' => null),
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
			'cusID' => 'ID',
			'screenName' => 'Screen Name',
			'password' => 'Password',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'isActive' => 'Actived',
			'email' => 'Email',
			'officePhone' => 'Office Phone',
			'mobilePhone' => 'Mobile Phone',
			'facebook' => 'Facebook',
			'instragram' => 'Instragram',
			'tweeter' => 'Tweeter',
			'skype' => 'Skype',
			'line' => 'Line',
			'preferredLang' => 'Preferred Lang',
			'imei' => 'Imei',
			'isActivated' => 'Activated',
			'activatedDate' => 'Activated Date',
			'isDeleted' => ' Deleted',
			'deviceID' => 'Device',
			'lastLogin' => 'Last Login',
			'deviceType' => 'Device Type',
			'avatar' => 'Avatar',
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

		$criteria->compare('cusID',$this->cusID,true);
		$criteria->compare('screenName',$this->screenName,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('officePhone',$this->officePhone,true);
		$criteria->compare('mobilePhone',$this->mobilePhone,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('instragram',$this->instragram,true);
		$criteria->compare('tweeter',$this->tweeter,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('line',$this->line,true);
		$criteria->compare('preferredLang',$this->preferredLang,true);
		$criteria->compare('imei',$this->imei,true);
		$criteria->compare('isActivated',$this->isActivated);
		$criteria->compare('activatedDate',$this->activatedDate,true);
		$criteria->compare('isDeleted',$this->isDeleted);
		$criteria->compare('deviceID',$this->deviceID,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);
		$criteria->compare('deviceType',$this->deviceType);
		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
