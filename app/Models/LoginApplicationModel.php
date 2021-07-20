<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginApplicationModel extends Model
{
    public function apps()
    {
        return $this->hasMany('App\Models\ApplicationsModel', 'id', 'applications_id');
    }

    use HasFactory;
    protected $table = 'login_application';
    protected $primarykey = 'login_id';
}
