<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'biodata_penduduk';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'no_nik';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['no_nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'sdhk', 'agama_id', 'pendidikan_terakhir', 'pekerjaan', 'nama_ibu', 'no_kk'];

    public function agama()
    {
        return $this->belongsTo('App\Models\Agama', 'agama_id', 'agama_id');
    }

    public function kartuKeluarga()
    {
        return $this->belongsTo('App\Models\KartuKeluarga', 'no_kk', 'no_kk');
    }
}
