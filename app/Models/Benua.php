<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benua extends Model
{
    protected $table = 'benuas';
    protected $fillable = [
        'benua'
    ]; 
    protected $hidden= [
        
    ]; 
    public function cooperation()
    {
        return $this->hasmany(Cooperation::class,'benua_id');
    }
    public function country()
    {
        return $this->hasmany(Country::class,'code');
    }
}
