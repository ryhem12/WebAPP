<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{ 
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'from_stop_id',
        'to_stop_id',
        'time',
        'distance',
    ];
}
