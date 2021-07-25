<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationsModel extends Model
{
    public function profiles()
    {
        if (!session('id')) {
            $id = session('user')['id'];
        } else {
            $id = session('id');
        }
        return $this->hasOne('App\Models\LoginApplicationModel', 'applications_id', 'id')->where('login_id', $id);
    }

    use HasFactory;
    protected $table = 'applications';
    protected $primarykey = 'id';
}
