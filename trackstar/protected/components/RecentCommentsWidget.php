<?php
/**
 * RecentCommentsWidget is a Yii widget used to display a list of recent comments 
 */
class RecentCommentsWidget extends CWidget
{
	private $_comments;  
	public $displayLimit = 5;
	public $projectId = null;
	
	public function init()
    {
        if(null !== $this->projectId)
			$this->_comments = Comment::model()->with(array('issue'=>array('condition'=>'project_id='.$this->projectId)))->recent($this->displayLimit)->findAll();
		else
			$this->_comments = Comment::model()->recent($this->displayLimit)->findAll();
    }  

    public function getData()
	{
		return $this->_comments;
	}

    public function run()
    {
        // this method is called by CController::endWidget()    
        $this->render('recentCommentsWidget');
    }
}
