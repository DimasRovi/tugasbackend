<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='jurusan';
    protected $primarykey='id_jurusan';
    protected $fillable=['namajurusan'];
}