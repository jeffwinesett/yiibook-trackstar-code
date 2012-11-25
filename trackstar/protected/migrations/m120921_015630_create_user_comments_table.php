<?php

class m120921_015630_create_user_comments_table extends CDbMigration
{
	public function up()
	{
		//create the issue table
		$this->createTable('tbl_comment', array(
			'id' => 'pk',
		    'content' => 'text NOT NULL',
		    'issue_id' => 'int(11) NOT NULL',
			'create_time' => 'datetime DEFAULT NULL',
			'create_user_id' => 'int(11) DEFAULT NULL',
			'update_time' => 'datetime DEFAULT NULL',
			'update_user_id' => 'int(11) DEFAULT NULL',
		 ), 'ENGINE=InnoDB');
		
		//the tbl_comment.issue_id is a reference to tbl_issue.id 
		$this->addForeignKey("fk_comment_issue", "tbl_comment", "issue_id", "tbl_issue", "id", "CASCADE", "RESTRICT");
		
		//the tbl_issue.create_user_id is a reference to tbl_user.id 
		$this->addForeignKey("fk_comment_owner", "tbl_comment", "create_user_id", "tbl_user", "id", "RESTRICT", "RESTRICT");
		
		//the tbl_issue.updated_user_id is a reference to tbl_user.id 
		$this->addForeignKey("fk_comment_update_user", "tbl_comment", "update_user_id", "tbl_user", "id", "RESTRICT", "RESTRICT");
	}

	public function down()
	{
		$this->dropForeignKey('fk_comment_issue', 'tbl_comment');
		$this->dropForeignKey('fk_comment_owner', 'tbl_comment');
		$this->dropForeignKey('fk_comment_update_user', 'tbl_comment');
		$this->dropTable('tbl_comment');
	}

	
}