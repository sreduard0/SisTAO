<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public function login()
    {
        return $this->hasOne('App\Models\LoginModel', 'users_id', 'id');
    }

    public function rank()
    {
        return $this->hasOne('App\Models\RanksModel', 'id', 'rank_id');
    }

    public function departament()
    {
        return $this->hasOne('App\Models\DepartamentModel', 'id', 'departament_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\CompanyModel', 'id', 'company_id');
    }

    public function city()
    {
        return $this->hasOne('App\Models\CitiesModel', 'id', 'city_id');
    }

    use HasFactory;
    protected $table = 'users';
    protected $primarykey = 'id';
}
