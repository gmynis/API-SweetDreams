<?php
namespace Fuel\Migrations;

class RelUsersItems
{
	function up()
	{
		\DBUtil::create_table('rel_users_items',array(
			'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
			'fk_users' => array('type' => 'int', 'constraint' => 11),
			'fk_items' => array('type' => 'int', 'constraint' => 11),
			'unidades' => array('type' => 'int', 'constraint' => 50),

			), array('id','fk_users','fk_items','unidades'));
	}
	function down()
	{
		\DBUtil::drop_table('rel_users_items');
	}

}