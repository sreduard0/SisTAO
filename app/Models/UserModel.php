<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public function ranks()
    {
        return $this->hasOne('App\Models\RanksModel', 'id', 'rank_id');
    }

    public function departament()
    {
        return $this->hasOne('App\Models\DepartamentModel', 'id', 'departament_id');
    }

    use HasFactory;
    protected $table = 'users';
    protected $primarykey = 'id';
}
