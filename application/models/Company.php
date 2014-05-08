<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property string $companyID
 * @property string $comName
 * @property string $taxID
 * @property string $contactPerson
 * @property string $phoneNumber
 * @property string $faxNumber
 * @property string $logoIcon
 * @property string $logoImage
 * @property string $beginDate
 * @property string $endDate
 * @property integer $isActive
 * @property integer $isDeleted
 * @property string $createDate
 * @property integer $createUser
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comName', 'required'),
			array('isActive, isDeleted, createUser', 'numerical', 'integerOnly'=>true),
			array('comName, contactPerson', 'length', 'max'=>250),
			array('taxID, phoneNumber, faxNumber', 'length', 'max'=>100),
			array('logoIcon, logoImage', 'length', 'max'=>200),
			array('beginDate, endDate, createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('companyID, comName, taxID, contactPerson, phoneNumber, faxNumber, logoIcon, logoImage, beginDate, endDate, isActive, isDeleted, createDate, createUser', 'safe', 'on'=>'search'),
			array('beginDate, endDate', 'date', 'format' => 'yyyy-MM-dd'),
			array('beginDate, endDate', 'default', 'setOnEmpty' => true, 'value' => null),
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
		'companyID' => 'ID',			'comName' => 'Company Name',
			'taxID' => 'Tax',
			'contactPerson' => 'Contact Person',
			'phoneNumber' => 'Phone Number',
			'faxNumber' => 'Fax Number',
			'logoIcon' => 'Logo Icon',
			'logoImage' => 'Logo Image',
			'beginDate' => 'Begin Date',
			'endDate' => 'End Date',
			'isActive' => 'Actived',
			'isDeleted' => 'Deleted',
			'createDate' => 'Create Date',
			'createUser' => 'Create User',
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

		$criteria->compare('companyID',$this->companyID,true);
		$criteria->compare('comName',$this->comName,true);
		$criteria->compare('taxID',$this->taxID,true);
		$criteria->compare('contactPerson',$this->contactPerson,true);
		$criteria->compare('phoneNumber',$this->phoneNumber,true);
		$criteria->compare('faxNumber',$this->faxNumber,true);
		$criteria->compare('logoIcon',$this->logoIcon,true);
		$criteria->compare('logoImage',$this->logoImage,true);
		$criteria->compare('beginDate',$this->beginDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('isDeleted',$this->isDeleted);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('createUser',$this->createUser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'pagination'=>array( 'pageSize'=>20, ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
