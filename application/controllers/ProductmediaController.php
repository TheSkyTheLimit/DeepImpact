<?php

class ProductMediaController extends Controller
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
		$model=new ProductMedia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductMedia']))
		{
			$Refpage = "Med";
			$model->attributes=$_POST['ProductMedia'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$uploadedMedia=CUploadedFile::getInstance($model,'mediaURL');
			$mediafile = "{$Refpage}-{$uploadedMedia}"; 
			if ($uploadedMedia !== null)
			$model->mediaURL =  $mediafile ;
			$ProdModel = Products::model()->findByPk($model->prodID);
			$GrpModel = ProductGroup::model()->findByPk($ProdModel->grpID);
			$CatModel = Categories::model()->findByPk($GrpModel->catID);
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
				$mtype= array('1'=>'media/image', '2'=>'media/audio','3'=>'media/video');
				if ($uploadedMedia !== null)
				$uploadedMedia->saveAs($com_folder.'/'. $mtype[$model->mediaType] .'/'.$mediafile);  
				Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->mediaID));
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
		$oldmediaURL  = $model->mediaURL;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductMedia']))
		{
			$Refpage = "Med";
			$mtype= array('1'=>'/media/image/', '2'=>'/media/audio/','3'=>'/media/video/');
			$model->attributes=$_POST['ProductMedia'];
			$folder=Yii::getPathOfAlias('webroot.contents').DIRECTORY_SEPARATOR;
			$uploadedMedia=CUploadedFile::getInstance($model,'mediaURL');
			$ProdModel = Products::model()->findByPk($model->prodID);
			$GrpModel = ProductGroup::model()->findByPk($ProdModel->grpID);
			$CatModel = Categories::model()->findByPk($GrpModel->catID);
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
            $mediafile = "{$Refpage}-{$uploadedMedia}";
			if ($uploadedMedia !== null)
				$model->mediaURL    = $mediafile;
			else
				$model->mediaURL    = $oldmediaURL;
			if($model->save()){
				if ($uploadedMedia !== null)
				$uploadedMedia->saveAs($com_folder. $mtype[$model->mediaType].$mediafile);  
				Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
				$this->redirect(array('view','id'=>$model->mediaID));
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
		$model=$this->loadModel($id);
		$model->isDeleted =1;
		if($model->save())
		{
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			Yii::app()->db->createCommand("Update configurations set Version=Version+1")->execute();
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProductMedia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductMedia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductMedia']))
			$model->attributes=$_GET['ProductMedia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductMedia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductMedia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductMedia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-media-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
