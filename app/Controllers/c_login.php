<?php

namespace App\Controllers;

use App\Models\m_user;

class c_login extends BaseController
{

  public function index()
  {
    return view('v_login');
  }

  public function process()
  {
    // $this->load->library('encryption');
    $user = new m_user();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $dataUser = $user->where([
      'username' => $username,
    ])->first();
    if ($dataUser) {
      if (MD5($password) === $dataUser['password']) {
        session()->set([
          'username' => $dataUser['username'],
          'logged_in' => TRUE
        ]);
        return redirect()->to(base_url('/'));
      } else {
        session()->setFlashdata('error', 'Password Salah');
        return redirect()->back();
      }
    } else {
      session()->setFlashdata('error', 'Username Tidak Ditemukan!');
      return redirect()->back();
    }
  }

  function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}
