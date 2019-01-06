<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table = 'vehicles';


    protected $primaryKey = 'serie';

    protected  $fillable = ['color','speed','power','capacity','maker_id'];

    protected $hidden =[ 'serie'];


    public function makers()
    {
        $this->belongsTo('App\makers');
    }

}
