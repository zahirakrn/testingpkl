<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_kabupaten'];
    public $timestamp = true;

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

}
