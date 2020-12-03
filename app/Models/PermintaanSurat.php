<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanSurat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permintaan_surat';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'permintaan_surat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'jenis_surat_id', 'status_surat'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id' ,'id');
    }
    public function isianPermintaanSurat()
    {
        return $this->hasMany('App\Models\IsianPermintaanSurat', 'permintaan_surat_id', 'permintaan_surat_id');
    }

    public function jenisSurat()
    {
        return $this->belongsTo('App\Models\JenisSurat', 'jenis_surat_id', 'jenis_surat_id');
    }
}
