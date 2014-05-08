<?php

class CategoriesController extends Controller
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
		$model=new Categories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Categories']))
		{
			$Refpage = "Cat";
			$model->attributes=$_POST['Categories'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$uploadedIcon=CUploadedFile::getInstance($model,'catIcon');
			$iconfile = "{$Refpage}-{$uploadedIcon}";  // random number + file name
			$uploadedImage=CUploadedFile::getInstance($model,'catImage');
			$Imagefile = "{$Refpage}-{$uploadedImage}";  // random number + file name
			if ($uploadedIcon !== null)
			$model->catIcon =  $iconfile ;
			if ($uploadedImage !== null)
			$model->catImage = $Imagefile;
			if($model->save())
				$com_folder = $folder ."/C". substr("000000".$model->companyID, -6, 6);
				if(!is_dir($com_folder)){
					mkdir($com_folder);
					mkdir($com_folder."/icon");
					mkdir($com_folder."/image");
					mkdir($com_folder."/media");
					mkdir($com_folder."/media/image");
					mkdir($com_folder."/media/video");
					mkdir($com_folder."/media/audio");
				}
				if ($uploadedIcon !== null)
				 $uploadedIcon->saveAs($com_folder.'/icon/'.$iconfile);  
				if ($uploadedImage !== null)
				 $uploadedImage->saveAs($com_folder.'/image/'.$Imagefile);  
				Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->catID));
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
		$oldcatIcon    = $model->catIcon;
		$oldcatImage    = $model->catImage;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categories']))
		{
			$Refpage = "Cat";
			$model->attributes=$_POST['Categories'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$com_folder = $folder ."/C". substr("000000".$model->companyID, -6, 6);
				if(!is_dir($com_folder)){
					mkdir($com_folder);
					mkdir($com_folder."/icon");
					mkdir($com_folder."/image");
					mkdir($com_folder."/media");
					mkdir($com_folder."/media/image");
					mkdir($com_folder."/media/video");
					mkdir($com_folder."/media/audio");
				}
			$uploadedIcon=CUploadedFile::getInstance($model,'catIcon');
            $iconfile = "{$Refpage}-{$uploadedIcon}";
			 $uploadedImage=CUploadedFile::getInstance($model,'catImage');
            $Imagefile = "{$Refpage}-{$uploadedImage}";  // random number + file name
			if ($uploadedIcon !== null)
				$model->catIcon    = $iconfile;
			else
				$model->catIcon    = $oldcatIcon;
			if ($uploadedImage !== null)
				$model->catImage    = $Imagefile ;
			else
				$model->catImage    = $oldcatImage;
			
			if($model->save())
				 if (!empty($uploadedIcon))
						$uploadedIcon->saveAs($com_folder.'/icon/'.$iconfile);  
				  if (!empty($uploadedImage))
						$uploadedImage->saveAs($com_folder.'/image/'.$Imagefile);  
				  Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->catID));
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
		
	//	$this->loadModel($id)->delete();
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
		$dataProvider=new CActiveDataProvider('Categories');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new Categories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Categories']))
			$model->attributes=$_GET['Categories'];
			$this->render('admin',array('model'=>$model,));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Categories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
