<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoginModel extends Model
{
    public function data()
    {
        return $this->hasOne('App\Models\UserModel', 'id', 'users_id')->withTrashed();
    }
    public function permissions()
    {
        return $this->hasMany('App\Models\LoginApplicationModel', 'login_id', 'users_id');
    }


    use HasFactory;
    protected $table = 'login';
    protected $primarykey = 'id';
}
