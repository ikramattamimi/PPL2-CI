<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nim', 'nama', 'umur'];

    function getMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $search = $data['nama'];
        // dd($data['nama']);
        $data = $db->query("select * from mahasiswa where nama like '%$search%' order by nim")->getResultArray();
        return $data;
    }


    function storeMahasiswa($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $foto = $data['foto'];
        $tinggi_badan = $data['tinggi_badan'];

        $dataBerkas = $foto;
        $fileName = $dataBerkas->getRandomName();
        $db = \Config\Database::connect();
        $result = $db->query("insert into mahasiswa (nim, nama, umur, foto, tinggi_badan) 
            values('$nim', '$nama', '$umur', '$fileName', '$tinggi_badan')");
        if ($result) {
            $dataBerkas->move('uploads/foto/', $fileName);
        }

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
