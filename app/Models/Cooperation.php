<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    protected $table = 'cooperations';
    protected $fillable = [
        'name','lembaga_id','jeniskerjasama_id','benua_id','negara_id','kota_id',
        'bidang_id','tgl_mulai','tgl_berakhir','documents'
    ];
    protected $hidden = [

    ];
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class,'lembaga_id','id');
    }
    public function jeniskerjasama()
    {
        return $this->belongsTo(JenisKerjasama::class,'jeniskerjasama_id','id');
    }
    public function benua()
    {
        return $this->belongsTo(Benua::class,'Benua_id','id');
    }
    public function negara()
    {
        return $this->belongsTo(Negara::class,'negara_id','id');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class,'kota_id','id');
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class,'bidang_id','id');
    }
    public function getDocumentsAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function kegiatan()
    {
        return $this->hasmany(Kegiatan::class,'kerjasama_id');
    }
}
