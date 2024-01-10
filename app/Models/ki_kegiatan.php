<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ki_kegiatan extends Model
{
    protected $guard = ['id'];
    protected $fillable = ['metode','isi','ki_id'];
    use HasFactory;
}
