<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    // use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'i_code';
    public $timestamps = false;
}
