<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationsModel extends Model
{
    public function profiles()
    {
        return $this->hasOne('App\Models\LoginApplicationModel', 'applications_id', 'id')->where('login_id', session('id'));
    }

    use HasFactory;
    protected $table = 'applications';
    protected $primarykey = 'id';
}
