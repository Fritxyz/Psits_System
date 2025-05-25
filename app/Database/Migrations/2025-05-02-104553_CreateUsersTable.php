<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class migrate_users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 155,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'data-user-email' => [
                'type'       => 'VARCHAR',
                'constraint' => '155',
                'unique'     => true,
            ],
            'data-user-password' => [
                'type'       => 'VARCHAR',
                'constraint' => '155',
            ],
            'data-user-cpassword' => [
                'type'       => 'VARCHAR',
                'constraint' => '155',
            ],
            'data-user-otp' => [
            'type' => 'VARCHAR',
            'constraint' => 6,
            'null' => true,
            ],
            'data-user-otp-expires' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('migrate_users');
            
    }

    public function down()
    {
        $this->forge->dropTable('migrate_users');
    }
}
