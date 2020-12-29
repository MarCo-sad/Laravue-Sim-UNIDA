<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activities';
    protected $fillable = [
        'name','kerjasama_id','lembaga_id','descriptions','tgl_mulai','documents'
    ]; 
    
    protected $hidden = [

    ];
    public function kerjasama()
    {
        return $this->belongsTo(Cooperation::class,'kerjasama_id','id');
    }
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class,'lembaga_id','id');
    }
}
