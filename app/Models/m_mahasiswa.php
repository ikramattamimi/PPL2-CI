<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nim', 'nama', 'umur'];

    function getMahasiswa()
    {

        $db = \Config\Database::connect();
        $data = $db->query('select * from mahasiswa')->getResultArray();
        // $data = $this->findAll();
        return $data;
    }

    function storeMahasiswa($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];

        $db = \Config\Database::connect();
        $result = $db->query("insert into mahasiswa (nim, nama, umur) values('$nim', '$nama', '$umur')");

        return $result;
    }
}
