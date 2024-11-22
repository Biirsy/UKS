<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'nama',
        'kelas_id',
        'keluhan',
        'obat_id',
        'keterangan_id',
        'tanggal_berkunjung'
    ];    

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(strtolower($value));
    }

    public function obatName()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    public function kelasName()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function keteranganName()
    {
        return $this->belongsTo(Keterangan::class, 'keterangan_id');
    }
}
