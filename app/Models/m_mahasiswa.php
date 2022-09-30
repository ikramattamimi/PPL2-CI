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
        $data = $db->query('select * from mahasiswa order by nim')->getResultArray();
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

    function getDetailMahasiswa($id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from mahasiswa where id = $id")->getResultArray();

        return $result;
    }

    function deleteMahasiswa($id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("delete from mahasiswa where id = $id");

        return $result;
    }

    function searchMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $search = $data['nama'];
        // dd($data['nama']);
        $data = $db->query("select * from mahasiswa where nama like '%$search%' order by nim")->getResultArray();
        return $data;
    }

    function updateMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $id = $data['id'];
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];

        $result = $db->query("update mahasiswa set nama='$nama', umur='$umur', nim='$nim' where id = '$id'");

        return $result;
    }
}
