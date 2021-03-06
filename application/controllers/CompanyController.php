<?php

class CompanyController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update','create','delete'),
				'users'=>array('admin'),
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
		$model=new Company;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Company']))
		{
			$Refpage = "Com";
            $model->attributes=$_POST['Company'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$com_folder = $folder ."/C". substr("000000".$model->companyID, -6, 6);

            $uploadedIcon=CUploadedFile::getInstance($model,'logoIcon');
            $iconfile = "{$Refpage}-{$uploadedIcon}";  // random number + file name
			 $uploadedImage=CUploadedFile::getInstance($model,'logoImage');
            $Imagefile = "{$Refpage}-{$uploadedImage}";  // random number + file name
			$model->logoIcon =  $iconfile ;
			$model->logoImage = $Imagefile;
			if($model->save()){
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
				 $uploadedIcon->saveAs($com_folder.'/icon/'.$iconfile);  
				 $uploadedImage->saveAs($com_folder.'/image/'.$Imagefile);  
				 Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->companyID));
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
		$oldlogoIcon    = $model->logoIcon;
		$oldlogoImage    = $model->logoImage;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Company']))
		{
			$Refpage = "Com";
			$model->attributes=$_POST['Company'];
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
			$uploadedIcon=CUploadedFile::getInstance($model,'logoIcon');
            $iconfile = "{$Refpage}-{$uploadedIcon}";
			 $uploadedImage=CUploadedFile::getInstance($model,'logoImage');
            $Imagefile = "{$Refpage}-{$uploadedImage}";  // random number + file name
			if ($uploadedIcon !== null)
				$model->logoIcon    = $iconfile;
			else
				$model->logoIcon    = $oldlogoIcon;
			if ($uploadedImage !== null)
				$model->logoImage    = $Imagefile ;
			else
				$model->logoImage    = $oldlogoImage;

			if($model->save()){
				 if (!empty($uploadedIcon))
						$uploadedIcon->saveAs($com_folder.'/icon/'.$iconfile);  
				  if (!empty($uploadedImage))
						$uploadedImage->saveAs($com_folder.'/image/'.$Imagefile);  
				  Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->companyID));
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
		$this->loadModel($id)->delete();
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
		$dataProvider=new CActiveDataProvider('Company');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Company('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Company']))
			$model->attributes=$_GET['Company'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function HomeDirectory($id){
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$com_folder = $folder ."/C". substr("000000".$id, -6, 6);
				if(!is_dir($com_folder)){
					mkdir($com_folder);
					mkdir($com_folder."/icon");
					mkdir($com_folder."/image");
					mkdir($com_folder."/media");
					mkdir($com_folder."/media/image");
					mkdir($com_folder."/media/video");
					mkdir($com_folder."/media/audio");
				}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Company the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Company $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
