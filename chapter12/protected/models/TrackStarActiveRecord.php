<?php
abstract class TrackStarActiveRecord extends CActiveRecord
{
	 /**
	 * Prepares create_user_id and update_user_id attributes before saving.
	 */
	
	protected function beforeSave()
	{
		
		if(null !== Yii::app()->user)
			$id=Yii::app()->user->id;
		else
			$id=1;
		
		if($this->isNewRecord)
			$this->create_user_id=$id;
		
		$this->update_user_id=$id;
		
		return parent::beforeSave();
	}
	
	/**
	 * Attaches the timestamp behavior to update our create and update times
	 */
	public function behaviors() 
	{
		return array(
	 		'CTimestampBehavior' => array(
	 			'class' => 'zii.behaviors.CTimestampBehavior',
	 			'createAttribute' => 'create_time',
	 			'updateAttribute' => 'update_time',
				'setUpdateOnCreate' => true,
			),
	 	);
	}
		
}
