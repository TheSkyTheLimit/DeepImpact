<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property string $userID
 * @property string $screenName
 * @property string $userName
 * @property string $userPassword
 * @property string $firstName
 * @property string $lastName
 * @property integer $privilegeLevel
 * @property integer $companyID
 * @property integer $isActive
 * @property string $lastLogin
 * @property string $avatar
 * @property string $createDate
 * @property string $email
 * @property string $officePhone
 * @property string $mobilePhone
 * @property integer $isAdmin
 * @property integer $isDeleted
 */
class Admin extends CActiveRecord
{
	public $salt;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userName, userPassword, firstName, lastName, companyID, email', 'required'),
			array('privilegeLevel, companyID, isActive, isAdmin, isDeleted', 'numerical', 'integerOnly'=>true),
			array('screenName, userPassword, officePhone, mobilePhone', 'length', 'max'=>200),
			array('userName', 'length', 'max'=>50),
			array('firstName, lastName', 'length', 'max'=>100),
			array('avatar, email', 'length', 'max'=>250),
			array('lastLogin, createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('email', 'email','checkMX'=>true), 
			array('userID, screenName, userName, userPassword, firstName, lastName, privilegeLevel, companyID, isActive, lastLogin, avatar, createDate, email, officePhone, mobilePhone, isAdmin, isDeleted', 'safe', 'on'=>'search'),
			array('lastLogin', 'default', 'setOnEmpty' => true, 'value' => null),
			array('createDate','default','value'=>new CDbExpression('NOW()')),
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
			'userID' => 'ID',
			'screenName' => 'Screen Name',
			'userName' => 'User Name',
			'userPassword' => 'Password',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'privilegeLevel' => 'Privilege Level',
			'companyID' => 'Company',
			'isActive' => 'Actived',
			'lastLogin' => 'Last Login',
			'avatar' => 'Avatar',
			'createDate' => 'Created Date',
			'email' => 'Email',
			'officePhone' => 'Office Phone',
			'mobilePhone' => 'Mobile Phone',
			'isAdmin' => 'Administrator',
			'isDeleted' => 'Deleted',
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
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('screenName',$this->screenName,true);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('companyID',$this->companyID);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('officePhone',$this->officePhone,true);
		$criteria->compare('mobilePhone',$this->mobilePhone,true);
		$criteria->compare('isAdmin',$this->isAdmin);
		$criteria->compare('isDeleted',0);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'pagination'=>array( 'pageSize'=>20, ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->userPassword;
	}
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	public function beforeSave() {
		/*
        $pass = md5($this->userPassword);
        $this->userPassword = $pass;
		*/
        return true;
    }
}
