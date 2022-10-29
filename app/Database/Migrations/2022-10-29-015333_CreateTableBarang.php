<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBarang extends Migration
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
            'nama_barang' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'harga_barang' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'stock' => [
                'type'           => 'INT',
                'constraint'     => 255
            ],
            'gambar' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
