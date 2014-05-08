<?php

/**
 * This is the model class for table "configurations".
 *
 * The followings are the available columns in table 'configurations':
 * @property integer $ConfigID
 * @property string $Version
 * @property string $GoogleID
 * @property string $GoogleEmail
 * @property string $GoogleLogin
 * @property string $GooglePassword
 * @property string $GoogleCData1
 * @property string $GoogleCData2
 * @property string $GoogleCData3
 * @property string $GoogleCData4
 * @property string $GoogleCData5
 * @property string $AppleID
 * @property string $AppleEmail
 * @property string $AppleLogin
 * @property string $ApplePassword
 * @property string $AppleCData1
 * @property string $AppleCData2
 * @property string $AppleCData3
 * @property string $AppleCData4
 * @property string $AppleCData5
 */
class Configurations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'configurations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ConfigID', 'numerical', 'integerOnly'=>true),
			array('Version', 'length', 'max'=>20),
			array('GoogleID, GoogleEmail, GoogleLogin, GooglePassword, GoogleCData1, GoogleCData2, GoogleCData3, GoogleCData4, GoogleCData5, AppleID, AppleEmail, AppleLogin, ApplePassword, AppleCData1, AppleCData2, AppleCData3, AppleCData4, AppleCData5', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ConfigID, Version, GoogleID, GoogleEmail, GoogleLogin, GooglePassword, GoogleCData1, GoogleCData2, GoogleCData3, GoogleCData4, GoogleCData5, AppleID, AppleEmail, AppleLogin, ApplePassword, AppleCData1, AppleCData2, AppleCData3, AppleCData4, AppleCData5', 'safe', 'on'=>'search'),
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
			'ConfigID' => 'Config',
			'Version' => 'Version',
			'GoogleID' => 'Google',
			'GoogleEmail' => 'Google Email',
			'GoogleLogin' => 'Google Login',
			'GooglePassword' => 'Google Password',
			'GoogleCData1' => 'Google Cdata1',
			'GoogleCData2' => 'Google Cdata2',
			'GoogleCData3' => 'Google Cdata3',
			'GoogleCData4' => 'Google Cdata4',
			'GoogleCData5' => 'Google Cdata5',
			'AppleID' => 'Apple',
			'AppleEmail' => 'Apple Email',
			'AppleLogin' => 'Apple Login',
			'ApplePassword' => 'Apple Password',
			'AppleCData1' => 'Apple Cdata1',
			'AppleCData2' => 'Apple Cdata2',
			'AppleCData3' => 'Apple Cdata3',
			'AppleCData4' => 'Apple Cdata4',
			'AppleCData5' => 'Apple Cdata5',
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

		$criteria->compare('ConfigID',$this->ConfigID);
		$criteria->compare('Version',$this->Version,true);
		$criteria->compare('GoogleID',$this->GoogleID,true);
		$criteria->compare('GoogleEmail',$this->GoogleEmail,true);
		$criteria->compare('GoogleLogin',$this->GoogleLogin,true);
		$criteria->compare('GooglePassword',$this->GooglePassword,true);
		$criteria->compare('GoogleCData1',$this->GoogleCData1,true);
		$criteria->compare('GoogleCData2',$this->GoogleCData2,true);
		$criteria->compare('GoogleCData3',$this->GoogleCData3,true);
		$criteria->compare('GoogleCData4',$this->GoogleCData4,true);
		$criteria->compare('GoogleCData5',$this->GoogleCData5,true);
		$criteria->compare('AppleID',$this->AppleID,true);
		$criteria->compare('AppleEmail',$this->AppleEmail,true);
		$criteria->compare('AppleLogin',$this->AppleLogin,true);
		$criteria->compare('ApplePassword',$this->ApplePassword,true);
		$criteria->compare('AppleCData1',$this->AppleCData1,true);
		$criteria->compare('AppleCData2',$this->AppleCData2,true);
		$criteria->compare('AppleCData3',$this->AppleCData3,true);
		$criteria->compare('AppleCData4',$this->AppleCData4,true);
		$criteria->compare('AppleCData5',$this->AppleCData5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Configurations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
