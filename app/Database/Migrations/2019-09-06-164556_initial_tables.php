<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialTables extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'key' => [
				'type' => 'varchar',
				'constraint' => '50',
			],
			'value' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('config');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'leader_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'auth_code' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'is_banned' => [
				'type' => 'ENUM',
				'constraint' => ['0', '1'],
				'default' => '0',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('teams');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'team_id' => [
				'type' => 'INT',
				'unsigned' => true,
				'null' => true,
			],
			'username' => [
				'type' => 'varchar',
				'constraint' => '50',
			],
			'password' => [
				'type' => 'varchar',
				'constraint' => '255',
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'email' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'auth_code' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'is_banned' => [
				'type' => 'ENUM',
				'constraint' => ['0', '1'],
				'default' => '0',
			],
			'is_verified' => [
				'type' => 'ENUM',
				'constraint' => ['0', '1'],
				'default' => '0',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('team_id','teams','id');
		$this->forge->createTable('users');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'description' => [
				'type' => 'varchar',
				'constraint' => '250',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('categories');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'category_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => '100',
				'unique' => true,
			],
			'point' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'description' => [
				'type' => 'varchar',
				'constraint' => '250',
			],
			'max_attempts' => [
				'type' => 'INT'
			],
			'type' => [
				'type' => 'ENUM',
				'constraint' => ['static', 'dynamic'],
				'default' => 'static',
			],
			'is_active' => [
				'type' => 'ENUM',
				'constraint' => ['0', '1'],
				'default' => '0',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('category_id','categories','id');
		$this->forge->createTable('challenges');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'challenge_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'team_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('challenge_id','challenges','id');
		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->addForeignKey('team_id','teams','id');
		$this->forge->createTable('solves');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'challenge_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'team_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'ip' => [
				'type' => 'varchar',
				'constraint' => '15'
			],
			'provided' => [
				'type' => 'varchar',
				'constraint' => '100'
			],
			'type' => [
				'type' => 'ENUM',
				'constraint' => ['0', '1'],
				'default' => '0',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);
		$this->forge->addForeignKey('challenge_id','challenges','id');
		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->addForeignKey('team_id','teams','id');
		$this->forge->addKey('id', true);
		$this->forge->createTable('submits');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'challenge_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'type' => [
				'type' => 'ENUM',
				'constraint' => ['static', 'regex'],
				'default' => 'static',
			],
			'content' => [
				'type' => 'varchar',
				'constraint' => '100'
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addForeignKey('challenge_id','challenges','id');
		$this->forge->addKey('id', true);
		$this->forge->createTable('flags');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'title' => [
				'type' => 'varchar',
				'constraint' => '100',
			],
			'content' => [
				'type' => 'text',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('notifications');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'challenge_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'content' => [
				'type' => 'text',
			],
			'cost' => [
				'type' => 'INT'
			],
			'is_active' => [
				'type' => 'ENUM',
				'constraint' => ['0', '1'],
				'default' => '0',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addForeignKey('challenge_id','challenges','id');
		$this->forge->addKey('id', true);
		$this->forge->createTable('hints');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'hint_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'team_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);
		$this->forge->addForeignKey('hint_id','hints','id');
		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->addForeignKey('team_id','teams','id');
		$this->forge->addKey('id', true);
		$this->forge->createTable('hint_unlocks');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'challenge_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'location' => [
				'type' => 'varchar',
				'constraint' => '500',
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('challenge_id','challenges','id');
		$this->forge->createTable('files');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'type' => [
				'type' => 'ENUM',
				'constraint' => ['login'],
			],
			'ip' => [
				'type' => 'varchar',
				'constraint' => '500',
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->createTable('tracking');


		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'challenge_id' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'min_value' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'max_value' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'decay_limit' => [
				'type' => 'INT',
				'unsigned' => true,
			],
			'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('challenge_id','challenges','id');
		$this->forge->createTable('dynamic_challenges');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyConstraints();

		$this->forge->dropTable('config');
		$this->forge->dropTable('teams');
		$this->forge->dropTable('users');
		$this->forge->dropTable('categories');
		$this->forge->dropTable('challenges');
		$this->forge->dropTable('solves');
		$this->forge->dropTable('submits');
		$this->forge->dropTable('flags');
		$this->forge->dropTable('notifications');
		$this->forge->dropTable('hints');
		$this->forge->dropTable('hint_unlocks');
		$this->forge->dropTable('files');
		$this->forge->dropTable('tracking');
		$this->forge->dropTable('dynamic_challenges');

		$this->db->enableForeignKeyConstraints();
	}
}
