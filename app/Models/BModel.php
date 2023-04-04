<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='buku';
    protected $primarykey='id_buku';
    protected $fillable=['judul_buku','jenis_buku','pengarang'];
}