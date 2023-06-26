<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPT extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id_perguruan_tinggi';
}
