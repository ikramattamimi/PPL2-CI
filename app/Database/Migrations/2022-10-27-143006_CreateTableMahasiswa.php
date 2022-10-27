<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMahasiswa extends Migration
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
            'nim' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'umur' => [
                'type'           => 'INT',
                'constraint'     => 2
            ],
            'foto' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'tinggi_badan' => [
                'type'           => 'INT',
                'constraint'     => 3
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
