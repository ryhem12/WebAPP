<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    protected $table='Stops';
    public $timestamps = false;
    use HasFactory;
    protected $fillable=[
     'name','longitude','latitude'
    ];
}
