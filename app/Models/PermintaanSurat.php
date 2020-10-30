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
    protected $fillable = ['user_id', 'jenis_surat_id', 'sudah_diproses'];
}
