<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidangs';
    protected $fillable = [
       'bidang'
    ]; 
    protected $hidden= [
        
    ]; 
    public function cooperation()
    {
        return $this->hasmany(Cooperation::class,'bidang_id');
    }
}
