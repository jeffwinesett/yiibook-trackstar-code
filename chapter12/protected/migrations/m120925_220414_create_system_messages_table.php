<?php

class m120925_220414_create_system_messages_table extends CDbMigration
{
		public function up()
		{
			//create the issue table
			$this->createTable('tbl_sys_message', array(
				'id' => 'pk',
			    'message' => 'text NOT NULL',
			    'create_time' => 'datetime DEFAULT NULL',
				'create_user_id' => 'int(11) DEFAULT NULL',
				'update_time' => 'datetime DEFAULT NULL',
				'update_user_id' => 'int(11) DEFAULT NULL',
			 ), 'ENGINE=InnoDB');

			//the tbl_issue.create_user_id is a reference to tbl_user.id 
			$this->addForeignKey("fk_sys_message_owner", "tbl_sys_message", "create_user_id", "tbl_user", "id", "CASCADE", "RESTRICT");

			//the tbl_issue.updated_user_id is a reference to tbl_user.id 
			$this->addForeignKey("fk_sys_message_update_user", "tbl_sys_message", "update_user_id", "tbl_user", "id", "CASCADE", "RESTRICT");

			//create an index on the update_time as we use this to sort our results
			$this->createIndex("idx_sys_message_update_time", "tbl_sys_message","update_time");
		}

		public function down()
		{
			$this->dropForeignKey('fk_sys_message_owner', 'tbl_sys_message');
			$this->dropForeignKey('fk_sys_message_update_user', 'tbl_sys_message');
			$this->dropTable('tbl_sys_message');
		}
	
}