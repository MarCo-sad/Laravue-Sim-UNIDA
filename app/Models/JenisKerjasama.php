<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKerjasama extends Model
{
    protected $table = 'jenis_kerjasamas';
    protected $fillable = [
        'jeniskerjasama'
    ]; 
    protected $hidden= [
        
    ]; 
    public function cooperation()
    {
        return $this->hasmany(Cooperation::class,'jeniskerjasama_id');
    }
}
