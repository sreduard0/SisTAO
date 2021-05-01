<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoginModel extends Model
{
    public function user_info()
    {
        return $this->hasOne('App\Models\UserModel', 'id', 'users_id');
    }

    use HasFactory;
    use SoftDeletes;
    protected $table = 'login';
    protected $primarykey = 'id';


}
