<?php

namespace App\Controllers;

use App\Models\m_mahasiswa;

class c_mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new m_mahasiswa();
    }

    public function display()
    {
        $data['nama'] = $this->request->getVar('nama');
        $data['mahasiswa'] = $this->mahasiswaModel->getMahasiswa($data);
        $data['jumlah_tinggi_badan'] = $this->mahasiswaModel->getJumlahTinggiBadan();
        $data['title'] = "Mahasiswa";
        $data['content_view'] = "v_mahasiswa";

        echo view('v_template', $data);
    }

    public function nilai()
    {
        $data['nama'] = $this->request->getVar('nama');
        $data['mahasiswa'] = $this->mahasiswaModel->getNilaiMahasiswa($data);
        $data['title'] = "Mahasiswa";
        $data['content_view'] = "v_nilai";

        echo view('v_template', $data);
    }

    public function grafik_tb()
    {
        $data['jumlah_tinggi_badan'] = $this->mahasiswaModel->getJumlahTinggiBadan();
        $data['title'] = "Grafik Tinggi badan Mahasiswa";
        $data['content_view'] = "v_grafik_tb";

        echo view('v_template', $data);
    }

    public function input()
    {
        $data['content_view'] = "v_mahasiswa_input";
        $data['title'] = "Input Mahasiswa";

        echo view('v_template', $data);
    }

    public function store()
    {
        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
            'foto' => $this->request->getFile('foto'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
        ];

        $result = $this->mahasiswaModel->storeMahasiswa($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->route('mahasiswa');
        }
    }

    function detail($id)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);

        $data['content_view'] = "v_mahasiswa_detail";
        $data['title'] = "Detail Mahasiswa";

        echo view('v_template', $data);
    }

    function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        $this->mahasiswaModel->deleteMahasiswa($mahasiswa);
        return redirect()->to('/mahasiswa');
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'nim'  => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'foto' => $this->request->getFile('foto'),
        ];

        $mahasiswa_lama = $this->mahasiswaModel->find($id);
        $data['foto_lama'] = $mahasiswa_lama['foto'];

        // dd($data);

        $result = $this->mahasiswaModel->updateMahasiswa($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->route('mahasiswa');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);
        $data['content_view'] = "v_mahasiswa_edit";
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

            $cekNis = $db->table('mahasiswa')->getWhere(['nim' => $nim])->getResult();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIM ada yang sama</b>');
            } else {

                $simpandata = [
                    'nim' => $nim, 'nama' => $nama, 'umur' => $umur, 'tinggi_badan' => $tinggi_badan
                ];

                $result = $db->table('mahasiswa')->insert($simpandata);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }

        return redirect()->to('/mahasiswa/data-mhs');
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

        return redirect()->to('/mahasiswa/nilai');
    }
}
