<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jenis_surat';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'jenis_surat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'persyaratan', 'biodata_diperlukan', 'nama_template'];

    public function isianSurat()
    {
        return $this->hasMany('App\Models\IsianSurat', 'jenis_surat_id', 'jenis_surat_id');
    }
}
