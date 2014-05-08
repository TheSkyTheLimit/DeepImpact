<?php

class ProductGroupController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProductGroup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductGroup']))
		{
			$Refpage = "Grp";
			$model->attributes=$_POST['ProductGroup'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$uploadedIcon=CUploadedFile::getInstance($model,'grpIcon');
			$iconfile = "{$Refpage}-{$uploadedIcon}"; 
			$uploadedImage=CUploadedFile::getInstance($model,'grpImage');
			$Imagefile = "{$Refpage}-{$uploadedImage}"; 
			if ($uploadedIcon !== null)
			$model->grpIcon =  $iconfile ;
			if ($uploadedImage !== null)
			$model->grpImage = $Imagefile;
			$CatModel = Categories::model()->findByPk($model->catID);
			$model->comHome= "C". substr("000000".$CatModel->companyID, -6, 6);
			if($model->save()){
				$com_folder = $folder ."/C". substr("000000".$CatModel->companyID, -6, 6);
				if(!is_dir($com_folder)){
					mkdir($com_folder);
					mkdir($com_folder."/icon");
					mkdir($com_folder."/image");
					mkdir($com_folder."/media");
					mkdir($com_folder."/media/image");
					mkdir($com_folder."/media/video");
					mkdir($com_folder."/media/audio");
				}
				 $uploadedIcon->saveAs($com_folder.'/icon/'.$iconfile);  
				 $uploadedImage->saveAs($com_folder.'/image/'.$Imagefile);  
				 Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->grpID));
				}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$oldgrpIcon  = $model->grpIcon;
		$oldgrpImage  = $model->grpImage;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductGroup']))
		{
			$Refpage = "Grp";
			$model->attributes=$_POST['ProductGroup'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$CatModel = Categories::model()->findByPk($model->catID);
			$com_folder = $folder ."/C". substr("000000".$CatModel->companyID, -6, 6);
				if(!is_dir($com_folder)){
					mkdir($com_folder);
					mkdir($com_folder."/icon");
					mkdir($com_folder."/image");
					mkdir($com_folder."/media");
					mkdir($com_folder."/media/image");
					mkdir($com_folder."/media/video");
					mkdir($com_folder."/media/audio");
				}
			$model->comHome="C". substr("000000".$CatModel->companyID, -6, 6);
			$uploadedIcon=CUploadedFile::getInstance($model,'grpIcon');
            $iconfile = "{$Refpage}-{$uploadedIcon}";
			 $uploadedImage=CUploadedFile::getInstance($model,'grpImage');
            $Imagefile = "{$Refpage}-{$uploadedImage}";  // random number + file name
			if ($uploadedIcon !== null)
				$model->grpIcon    = $iconfile;
			else
				$model->grpIcon    = $oldgrpIcon;
			if ($uploadedImage !== null)
				$model->grpImage    = $Imagefile ;
			else
				$model->grpImage    = $oldgrpImage;
			if($model->save()){
				if ($uploadedIcon !== null)
				 $uploadedIcon->saveAs($com_folder.'/icon/'.$iconfile);  
				if ($uploadedImage !== null)
				 $uploadedImage->saveAs($com_folder.'/image/'.$Imagefile);  
				Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->grpID));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$model=$this->loadModel($id);
		$model->isDeleted =1;
		if($model->save())
		{
				Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}		

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProductGroup');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductGroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductGroup']))
			$model->attributes=$_GET['ProductGroup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductGroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductGroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductGroup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
