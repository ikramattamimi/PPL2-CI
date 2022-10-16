<?php

namespace App\Controllers;

use App\Models\m_mahasiswa;

class c_home extends BaseController
{

  protected $mahasiswaModel;
  public function __construct()
  {
    $this->mahasiswaModel = new m_mahasiswa();
  }

  public function display()
  {
    $data['content_view'] = "v_home";
    $data['title'] = "Home";

    $data['nama'] = $this->request->getVar('nama');
    $data['mahasiswa'] = $this->mahasiswaModel->getMahasiswa($data);
    echo view('v_template', $data);
    // echo view('v_home');
  }
}
