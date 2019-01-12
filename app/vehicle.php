<?php

namespace App;
use App\makers;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table = 'vehicles';


    protected $primaryKey = 'serie';


    protected  $fillable = ['color','speed','power','capacity'];

    protected $hidden =[ 'serie','maker_id','created_at' ,'updated_at'];


    public function makers()
    {
      return  $this->belongsTo('App\makers','maker_id');
    }

}
