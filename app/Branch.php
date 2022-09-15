<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{



    protected $fillable = [

        
        'branch_name', 'role','email', 'telephone','address','state','postcode','country','image'

    ];


    public function users()
    {
        return $this->hasOne('App\User','id','user_id');
    }


}
