<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property string $catID
 * @property string $catName
 * @property string $catIcon
 * @property string $catImage
 * @property integer $isDeleted
 * @property integer $companyID
 * @property integer $userID
 * @property string $createDate
 */
class Categories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('isDeleted, companyID, userID', 'numerical', 'integerOnly'=>true),
			array('catName, catIcon, catImage', 'length', 'max'=>250),
			array('createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('catID, catName, catIcon, catImage, isDeleted, companyID, userID, createDate', 'safe', 'on'=>'search'),
			array('catName, companyID', 'required'),
			array('createDate','default','value'=>new CDbExpression('NOW()')),
		//	array('catIcon, catImage', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 1048576, 'wrongType'=>'Only jpg, gif, png allowed.'),
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
					'company' => array(self::HAS_ONE, 'company', 'companyID'),
					'productgroup' => array(self::MANY_MANY, 'productgroup', 'catID')
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'catID' => 'ID',
			'catName' => 'Category',
			'catIcon' => 'Category Icon',
			'catImage' => 'Category Image',
			'isDeleted' => 'Deleted',
			'companyID' => 'Company',
			'userID' => 'User',
			'createDate' => 'Create Date',
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
		$user = Yii::app()->user->id;
		$UserModel=Admin::model()->findByPk($user );
		$criteria=new CDbCriteria;
		$criteria->compare('catID',$this->catID,true);
		$criteria->compare('catName',$this->catName,true);
		$criteria->compare('catIcon',$this->catIcon,true);
		$criteria->compare('catImage',$this->catImage,true);
		$criteria->compare('isDeleted',0);
		if ($UserModel->isAdmin !=1){
			$criteria->compare('companyID',$UserModel->companyID);
		 }else{
			$criteria->compare('companyID',$this->companyID);
		
		 }
		$criteria->compare('userID',$this->userID);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'pagination'=>array( 'pageSize'=>20, ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
