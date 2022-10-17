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
}
