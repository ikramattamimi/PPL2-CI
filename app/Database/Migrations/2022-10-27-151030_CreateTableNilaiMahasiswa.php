<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableNilaiMahasiswa extends Migration
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
            'uts' => [
                'type'           => 'INT',
                'constraint'     => 3
            ],
            'uas' => [
                'type'           => 'INT',
                'constraint'     => 3
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('nilai_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_mahasiswa');
    }
}
