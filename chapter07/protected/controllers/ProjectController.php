<?php

class ProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$issueDataProvider=new CActiveDataProvider('Issue', array(
			'criteria'=>array(
		 		'condition'=>'project_id=:projectId',
		 		'params'=>array(':projectId'=>$this->loadModel($id)->id),
		 	),
		 	'pagination'=>array(
		 		'pageSize'=>1,
		 	),
		 ));
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'issueDataProvider'=>$issueDataProvider,
		));

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
			{
				//assign the user creating the new project as an owner of the project, 
				//so they have access to all project features
				$form=new ProjectUserForm;
				$form->username = Yii::app()->user->name;
				$form->project = $model;
				$form->role = 'owner';
				if($form->validate())
				{
					$form->assign();
				}
					
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Project');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Provides a form so that project administrators can
	 * associate other users to the project
	 */
	public function actionAdduser($id)
	{
		$project = $this->loadModel($id);
		if(!Yii::app()->user->checkAccess('createUser', array('project'=>$project)))
		{
			throw new CHttpException(403,'You are not authorized to perform this action.');
		}
		
		$form=new ProjectUserForm; 
		// collect user input data
		if(isset($_POST['ProjectUserForm']))
		{
			$form->attributes=$_POST['ProjectUserForm'];
			$form->project = $project;
			// validate user input  
			if($form->validate())  
			{
				if($form->assign())
				{
					Yii::app()->user->setFlash('success',$form->username . " has been added to the project." ); 
					//reset the form for another user to be associated if desired
					$form->unsetAttributes();
					$form->clearErrors();	
				}
			}
		}
		$form->project = $project;
		$this->render('adduser',array('model'=>$form)); 
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
