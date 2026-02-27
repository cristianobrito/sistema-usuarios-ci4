<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';           // passamos a tabela
    protected $primaryKey = 'id';         // primary key
    protected $allowedFields = ['name'];  // campo permitido
}