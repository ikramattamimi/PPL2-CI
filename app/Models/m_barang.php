<?php

namespace App\Models;

use CodeIgniter\Model;

class m_barang extends Model
{
  protected $table      = 'barang';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id', 'nama_barang', 'harga_barang', 'stok', 'gambar'];

  function getBarang($data)
  {
    $db = \Config\Database::connect();
    $search = $data['nama_barang'];
    $data = $db->query("select * from barang where nama_barang like '%$search%' order by nama_barang")->getResultArray();
    return $data;
  }

  function getNilaiMahasiswa($data)
  {
    $db = \Config\Database::connect();
    $search = $data['nama'];
    $data = $db->query("select * from nilai_mahasiswa where nama like '%$search%' order by nim")->getResultArray();
    return $data;
  }

  function getJumlahHargaBarang()
  {
    $db = \Config\Database::connect();
    $data['hb'] = $db->query("SELECT nama_barang, harga_barang FROM barang")->getResultArray();
    // dd($data['hb']);

    return $data;
  }

  function getBerita()
  {
    $db = \Config\Database::connect();
    $data = $db->query("SELECT * FROM berita")->getResultArray();

    return $data;
  }

  function storeBarang($data)
  {
    $nama_barang = $data['nama_barang'];
    $harga_barang = $data['harga_barang'];
    $stok = $data['stok'];
    $gambar = $data['gambar'];

    $dataBerkas = $gambar;
    $fileName = $dataBerkas->getRandomName();
    $db = \Config\Database::connect();

    if ($gambar->getName() !== "") {
      $result = $db->query("insert into barang (nama_barang, harga_barang, stok, gambar)
            values('$nama_barang', '$harga_barang', '$stok', '$fileName')");
      if ($result) {
        $dataBerkas->move('uploads/gambar/', $fileName);
      }
    } else {
      $result = $db->query("insert into barang (nama_barang, harga_barang, stok)
            values('$nama_barang', '$harga_barang', '$stok')");
    }

    return $result;
  }

  function getDetailMahasiswa($id)
  {
    $db = \Config\Database::connect();
    $result = $db->query("select * from barang where id = $id")->getResultArray();

    return $result;
  }

  function deleteBarang($barang)
  {
    $db = \Config\Database::connect();
    if ($barang['gambar'] !== "") {
      unlink('./uploads/gambar/' . $barang['gambar']);
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

  function updateBarang($data)
  {
    $db = \Config\Database::connect();
    $id = $data['id'];
    $nama_barang = $data['nama_barang'];
    $harga_barang = $data['harga_barang'];
    $stok = $data['stok'];
    $gambar = $data['gambar'];

    $dataBerkas = $gambar;
    $fileName = $dataBerkas->getRandomName();
    $db = \Config\Database::connect();
    if ($gambar->getName() !== "") {
      $result = $db->query("update barang set nama_barang='$nama_barang', harga_barang='$harga_barang', stok='$stok', gambar='$fileName' where id = '$id'");
      if ($result) {
        $dataBerkas->move('uploads/foto/', $fileName);
        if ($data['foto_lama'] !== "") {
          unlink('./uploads/foto/' . $data['foto_lama']);
        }
      }
    } else {
      $result = $db->query("update barang set nama_barang='$nama_barang', harga_barang='$harga_barang', stok='$stok' where id = '$id'");
    }

    return $result;
  }
}
