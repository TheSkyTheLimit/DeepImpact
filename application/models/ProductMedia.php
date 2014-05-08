<?php

/**
 * This is the model class for table "product_media".
 *
 * The followings are the available columns in table 'product_media':
 * @property string $mediaID
 * @property integer $prodID
 * @property string $mediaURL
 * @property integer $fileSize
 * @property string $shortDesc
 * @property string $longDesc
 * @property integer $mediaType
 * @property integer $isActive
 * @property integer $isDeleted
 * @property integer $createdBy
 * @property string $createDate
 */
class ProductMedia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_media';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prodID, fileSize, mediaType, isActive, isDeleted, createdBy', 'numerical', 'integerOnly'=>true),
			array('mediaURL, shortDesc', 'length', 'max'=>250),
			array('longDesc, createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mediaID,  mediaURL, fileSize, shortDesc, longDesc, mediaType, isActive, isDeleted, createdBy, createDate', 'safe', 'on'=>'search'),
			array('prodID',  'safe', 'on'=>'search'),
			array('prodID, mediaType', 'required'),
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
			'mediaID' => 'ID',
			'prodID' => 'Product',
			'mediaURL' => 'Media File',
			'fileSize' => 'Size',
			'shortDesc' => 'Summary',
			'longDesc' => 'Description',
			'mediaType' => 'Type',
			'isActive' => 'Actived',
			'isDeleted' => 'Is Deleted',
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

		$criteria->compare('mediaID',$this->mediaID,true);
		$criteria->compare('prodID',$this->prodID);
		$criteria->compare('mediaURL',$this->mediaURL,true);
		$criteria->compare('fileSize',$this->fileSize);
		$criteria->compare('shortDesc',$this->shortDesc,true);
		$criteria->compare('longDesc',$this->longDesc,true);
		$criteria->compare('mediaType',$this->mediaType);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('isDeleted',0);
		$criteria->compare('createdBy',$this->createdBy);
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
	 * @return ProductMedia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
