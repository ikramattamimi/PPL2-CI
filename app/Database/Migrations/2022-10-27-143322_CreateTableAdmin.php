<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
