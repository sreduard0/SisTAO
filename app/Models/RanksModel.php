<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RanksModel extends Model
{
    use HasFactory;
    protected $table = 'ranks';
    protected $primarykey = 'id';
}
