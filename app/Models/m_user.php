<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
  protected $table = 'admin';
  protected $allowedFields = ['id', 'username', 'password'];
}
