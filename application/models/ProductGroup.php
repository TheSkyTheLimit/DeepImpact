<?php

/**
 * This is the model class for table "product_group".
 *
 * The followings are the available columns in table 'product_group':
 * @property string $grpID
 * @property string $grpName
 * @property string $grpIcon
 * @property string $grpImage
 * @property integer $catID
 * @property integer $isActive
 * @property integer $isDeleted
 * @property integer $userID
 * @property string $createDate
 */
class ProductGroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catID, isActive, isDeleted, userID', 'numerical', 'integerOnly'=>true),
			array('grpName, grpIcon, grpImage', 'length', 'max'=>250),
			array('createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('grpID, grpName, grpIcon, grpImage, catID, isActive, isDeleted, userID, createDate', 'safe', 'on'=>'search'),
				array('grpName, catID', 'required'),
				array('createDate','default','value'=>new CDbExpression('NOW()')),
				array('grpIcon', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
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
			'categories' => array(self::HAS_ONE, 'categories', 'catID')
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'grpID' => 'ID',
			'grpName' => 'Group Name',
			'grpIcon' => 'Group Icon',
			'grpImage' => 'Group Image',
			'catID' => 'Category',
			'isActive' => 'Actived',
			'isDeleted' => 'Is Deleted',
			'userID' => 'User ID',
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
	//	$Categories=Categories::model()->findAll('Categories.companyID='. $UserModel->companyID);

		$criteria=new CDbCriteria;

		$criteria->compare('grpID',$this->grpID,true);
		$criteria->compare('grpName',$this->grpName,true);
		$criteria->compare('grpIcon',$this->grpIcon,true);
		$criteria->compare('grpImage',$this->grpImage,true);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('isDeleted',0);
		$criteria->compare('userID',$this->userID);
		$criteria->compare('createDate',$this->createDate,true);
		if ($UserModel->isAdmin !=1){
			$criteria->join='INNER JOIN categories ON t.catID=categories.catID';
			if ($this->catID !=""){
				$criteria->condition='categories.isDeleted=0 and categories.companyID='. $UserModel->companyID .' and t.catID='. $this->catID;
			}else{
				$criteria->condition='categories.companyID='. $UserModel->companyID;
			}
		 }else{
			$criteria->compare('t.catID',$this->catID);
		 }
		 

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			 'pagination'=>array( 'pageSize'=>20, ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductGroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
