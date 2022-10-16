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
        // $this->mahasiswaModel->save([
        //     'nim' => $this->request->getVar('nim'),
        //     'nama' => $this->request->getVar('nama'),
        //     'umur' => $this->request->getVar('umur'),
        // ]);

        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
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
        $this->mahasiswaModel->deleteMahasiswa($id);
        return redirect()->to('/mahasiswa');
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'nim'  => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
        ];

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
