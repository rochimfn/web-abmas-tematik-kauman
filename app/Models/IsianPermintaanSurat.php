<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsianPermintaanSurat extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'isian_permintaan_surat';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'isian_permintaan_surat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['permintaan_surat_id', 'nama_isian', 'nilai_isian'];
}
