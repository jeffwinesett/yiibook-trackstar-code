<?php

class m120509_224029_create_project_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_project', array(
		            'id' => 'pk',
		            'name' => 'string NOT NULL',
		            'description' => 'text NOT NULL',
					'create_time' => 'datetime DEFAULT NULL',
					'create_user_id' => 'int(11) DEFAULT NULL',
					'update_time' => 'datetime DEFAULT NULL',
					'update_user_id' => 'int(11) DEFAULT NULL',
		        ), 'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->dropTable('tbl_project');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}