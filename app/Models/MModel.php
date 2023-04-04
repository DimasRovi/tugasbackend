<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='mahasiswa';
    protected $primarykey='id';
    protected $fillable=['nama','jeniskelamin','alamat', 'id_jurusan'];
}
