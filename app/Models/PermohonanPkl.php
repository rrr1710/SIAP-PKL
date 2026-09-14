<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PermohonanPkl extends Model
{
    use HasFactory;

    protected $table = 'permohonan_pkl';

    protected $fillable = [
        'id_pemohon',
        'id_sub_instansi',
        'jenis_pengajuan',
        'status',
        'sekolah',
        'no_hp',
        'tanggal_mulai',
        'tanggal_selesai',
        'berkas_permohonan',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pemohon(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pemohon');
    }

    public function subInstansi(): BelongsTo
    {
        return $this->belongsTo(SubInstansi::class, 'id_sub_instansi');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(AnggotaPermohonan::class, 'id_permohonan');
    }

    public function pesertaMagang(): HasOne
    {
        return $this->hasOne(PesertaMagang::class, 'id_permohonan');
    }
}