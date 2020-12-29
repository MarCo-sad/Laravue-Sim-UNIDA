<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
        'name','code'
    ]; 
    public function cooperation()
    {
        return $this->hasmany(Cooperation::class,'negara_id');
    }
    public function benua()
    {
        return $this->belongsTo(Benua::class,'code','id');
    }
   
}
