<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'google_id',
        'name',
        'email',
        'avatar',
        'id_instansi',
        'nim',
        'sekolah',
        'no_hp',
        'password',
    ];

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    public function permohonanPkl(): HasMany
    {
        return $this->hasMany(PermohonanPkl::class, 'id_pemohon');
    }
}
