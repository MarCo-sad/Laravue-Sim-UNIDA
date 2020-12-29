<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembagas';
    protected $fillable = [
        'prodi','id_fakultas'
    ]; 
    protected $hidden= [
        
    ]; 
    public function cooperation()
    {
        return $this->hasmany(Cooperation::class,'lembaga_id');
    }
    public function actifities()
    {
        return $this->hasmany(Activities::class,'lembaga_id');
    }
}
