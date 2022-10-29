<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAdministrator extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'varchar',
                'constraint'     => 50,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('administrator');
    }

    public function down()
    {
        $this->forge->dropTable('administrator');
    }
}
