<?php

namespace App\Models;

use CodeIgniter\Model;

class Visitor extends Model
{
    protected $table = 'visitor';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['email', 'created_at'];
}
