<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    // use HasFactory;

    protected $table = 'guest';
    protected $primaryKey = 'i_code';
    public $timestamps = false;

    // protected $hidden = ['b_isactive'];

    protected $fillable = ['v_name', 'v_address', 'i_phone', 'v_notes'];
}
