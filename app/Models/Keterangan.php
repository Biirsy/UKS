<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $table = 'keterangans';

    protected $fillable = [
        'keterangan'
    ];

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
