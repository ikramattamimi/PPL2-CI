<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nim', 'nama', 'umur'];

    function getMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $search = $data['nama'];
        $data = $db->query("select * from barang where nama like '%$search%' order by nim")->getResultArray();
        return $data;
    }

    function getNilaiMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $search = $data['nama'];
        $data = $db->query("select * from nilai_mahasiswa where nama like '%$search%' order by nim")->getResultArray();
        return $data;
    }

    function getJumlahTinggiBadan()
    {
        $db = \Config\Database::connect();
        $data['tb'] = $db->query("SELECT nama, tinggi_badan FROM barang")->getResultArray();
        // dd($data['tb']);

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

        if ($foto->getName() !== "") {
            $result = $db->query("insert into barang (nim, nama, umur, foto, tinggi_badan)
            values('$nim', '$nama', '$umur', '$fileName', '$tinggi_badan')");
            if ($result) {
                $dataBerkas->move('uploads/foto/', $fileName);
            }
        } else {
            $result = $db->query("insert into barang (nim, nama, umur, tinggi_badan) 
            values('$nim', '$nama', '$umur', '$tinggi_badan')");
        }

        return $result;
    }

    function getDetailMahasiswa($id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from barang where id = $id")->getResultArray();

        return $result;
    }

    function deleteMahasiswa($barang)
    {
        $db = \Config\Database::connect();
        if ($barang['foto'] !== "") {
            unlink('./uploads/foto/' . $barang['foto']);
        }
        $id = $barang['id'];
        $result = $db->query("delete from barang where id = $id");

        return $result;
    }

    function searchMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $search = $data['nama'];
        $data = $db->query("select * from barang where nama like '%$search%' order by nim")->getResultArray();
        return $data;
    }

    function updateMahasiswa($data)
    {
        $db = \Config\Database::connect();
        $id = $data['id'];
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $foto = $data['foto'];
        $tinggi_badan = $data['tinggi_badan'];

        $dataBerkas = $foto;
        $fileName = $dataBerkas->getRandomName();
        $db = \Config\Database::connect();
        if ($foto->getName() !== "") {
            $result = $db->query("update barang set nama='$nama', umur='$umur', nim='$nim', tinggi_badan='$tinggi_badan', foto='$fileName' where id = '$id'");
            if ($result) {
                $dataBerkas->move('uploads/foto/', $fileName);
                if ($data['foto_lama'] !== "") {
                    unlink('./uploads/foto/' . $data['foto_lama']);
                }
            }
        } else {
            $result = $db->query("update barang set nama='$nama', umur='$umur', nim='$nim', tinggi_badan='$tinggi_badan' where id = '$id'");
        }

        return $result;
    }
}
