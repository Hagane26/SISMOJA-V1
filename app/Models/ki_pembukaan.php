<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ki_pembukaan extends Model
{
    protected $guard = ['id'];
    protected $fillable = ['langkah','isi','waktu','ki_id'];
    use HasFactory;
}
