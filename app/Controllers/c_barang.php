<?php

namespace App\Controllers;

use App\Models\m_barang;

class c_barang extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new m_barang();
    }

    public function display()
    {
        $data['nama_barang'] = $this->request->getVar('nama_barang');
        $data['barang'] = $this->barangModel->getBarang($data);
        $data['title'] = "Barang";
        $data['content_view'] = "v_barang";

        echo view('v_template', $data);
    }

    public function nilai()
    {
        $data['nama'] = $this->request->getVar('nama');
        $data['barang'] = $this->barangModel->getNilaiMahasiswa($data);
        $data['title'] = "Mahasiswa";
        $data['content_view'] = "v_nilai";

        echo view('v_template', $data);
    }

    public function grafik_hb()
    {
        $data['jumlah_harga_barang'] = $this->barangModel->getJumlahHargaBarang();
        $data['title'] = "Grafik Harga Barang";
        $data['content_view'] = "v_grafik_hb";

        echo view('v_template', $data);
    }

    public function berita()
    {
        $data['berita'] = $this->barangModel->getBerita();
        $data['title'] = "Berita";
        $data['content_view'] = "v_berita";

        echo view('v_template', $data);
    }

    public function input()
    {
        $data['content_view'] = "v_barang_input";
        $data['title'] = "Input Barang";

        echo view('v_template', $data);
    }

    public function store()
    {
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'stok' => $this->request->getVar('stok'),
            'gambar' => $this->request->getFile('gambar'),
        ];

        $result = $this->barangModel->storeBarang($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->route('barang');
        }
    }

    function detail($id)
    {
        $data['barang'] = $this->barangModel->find($id);

        $data['content_view'] = "v_barang_detail";
        $data['title'] = "Detail Barang";

        // dd($data['barang']['nama_barang']);

        echo view('v_template', $data);
    }

    function delete($id)
    {
        $barang = $this->barangModel->find($id);
        $this->barangModel->deleteBarang($barang);
        return redirect()->to('/barang/data-barang');
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'stok' => $this->request->getVar('stok'),
            'gambar' => $this->request->getFile('gambar'),
        ];

        $barang_lama = $this->barangModel->find($id);
        $data['gambar_lama'] = $barang_lama['gambar'];

        // dd($data);

        $result = $this->barangModel->updateBarang($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->route('barang');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['barang'] = $this->barangModel->find($id);
        $data['content_view'] = "v_barang_edit";
        echo view('v_template', $data);
    }

    public function simpanExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $nim = $row[0];
            $nama = $row[1];
            $umur = $row[2];
            $tinggi_badan = $row[3];

            $db = \Config\Database::connect();

            $cekNis = $db->table('barang')->getWhere(['nim' => $nim])->getResult();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIM ada yang sama</b>');
            } else {

                $simpandata = [
                    'nim' => $nim, 'nama' => $nama, 'umur' => $umur, 'tinggi_badan' => $tinggi_badan
                ];

                $result = $db->table('barang')->insert($simpandata);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }

        return redirect()->to('/barang/data-barang');
    }

    public function excel()
    {
        $data['title'] = "Excel";
        $data['content_view'] = "v_excel";
        $data['excel'] = "v_excel";

        echo view('v_template', $data);
    }

    public function excel2()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data['excel'] = $spreadsheet->getActiveSheet()->toArray();
        // dd($data['excel']);

        $data['title'] = "Excel";
        $data['content_view'] = "v_excel_import";

        echo view('v_template', $data);
    }

    public function storeNilaiExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $nim = $row[0];
            $nama = $row[1];
            $uts = $row[2];
            $uas = $row[3];

            $db = \Config\Database::connect();

            $cekNis = $db->table('nilai_mahasiswa')->getWhere(['nim' => $nim])->getResult();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIM ada yang sama</b>');
            } else {

                $simpandata = [
                    'nim' => $nim, 'nama' => $nama, 'uts' => $uts, 'uas' => $uas
                ];

                $result = $db->table('nilai_mahasiswa')->insert($simpandata);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }

        return redirect()->to('/barang/nilai');
    }
}
