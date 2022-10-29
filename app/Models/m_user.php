<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
  protected $table = 'administrator';
  protected $allowedFields = ['id', 'nama', 'password'];
}
