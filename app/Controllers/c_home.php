<?php

namespace App\Controllers;

class c_home extends BaseController
{
  public function display()
  {
    $data['content_view'] = "v_home";
    $data['title'] = "Home";

    echo view('v_template', $data);
  }
}
