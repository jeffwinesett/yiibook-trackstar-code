<?php

class MessageController extends Controller
{
    public $defaultAction = 'hello';
	public $time;
	public function actionHello()
	{
		$theTime = date('D M j G:i:s T Y');
		$this->render('hello',array('time'=>$theTime)); 
		//comment out the above two lines and uncomment the following two lines
		//for the 'try it yourself' exercies in chapter 2
		//$this->time = date("D M j G:i:s T Y");
		//$this->render('hello',array('time'=>$this->time)); 


	}
	
	public function actionGoodbye()
	{
		$this->render('goodbye');
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
