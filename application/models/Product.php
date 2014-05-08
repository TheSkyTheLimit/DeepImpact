<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property string $prodID
 * @property integer $grpID
 * @property string $prodName
 * @property string $prodLongName
 * @property string $prodShortDesc
 * @property string $prodDesc
 * @property integer $rating
 * @property string $prodIcon
 * @property string $qrData
 * @property integer $isActive
 * @property integer $isDeleted
 * @property string $maker
 * @property string $model
 * @property integer $createdBy
 * @property string $createDate
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grpID, rating, isActive, isDeleted, createdBy', 'numerical', 'integerOnly'=>true),
			array('prodName, prodShortDesc, prodIcon, maker, model', 'length', 'max'=>250),
			array('prodLongName, prodDesc, qrData, createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('prodID, grpID, prodName, prodLongName, prodShortDesc, prodDesc, rating, prodIcon, qrData, isActive, isDeleted, maker, model, createdBy, createDate', 'safe', 'on'=>'search'),
			array('prodName, grpID', 'required'),
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
			'prodID' => 'ID',
			'grpID' => 'Group',
			'prodName' => 'Product Name',
			'prodLongName' => 'Long Name',
			'prodShortDesc' => 'Short Description',
			'prodDesc' => 'Description',
			'rating' => 'Rating',
			'prodIcon' => 'Product Icon',
			'qrData' => 'QR Data',
			'isActive' => 'Actived',
			'isDeleted' => 'Deleted',
			'maker' => 'Maker',
			'model' => 'Model',
			'createdBy' => 'Created By',
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

		$criteria=new CDbCriteria;

		$criteria->compare('prodID',$this->prodID,true);
		$criteria->compare('grpID',$this->grpID);
		$criteria->compare('prodName',$this->prodName,true);
		$criteria->compare('prodLongName',$this->prodLongName,true);
		$criteria->compare('prodShortDesc',$this->prodShortDesc,true);
		$criteria->compare('prodDesc',$this->prodDesc,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('prodIcon',$this->prodIcon,true);
		$criteria->compare('qrData',$this->qrData,true);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('isDeleted',0);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('createdBy',$this->createdBy);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
