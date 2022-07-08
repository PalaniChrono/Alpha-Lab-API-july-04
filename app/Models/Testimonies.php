<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'testimony';
    protected $primaryKey = 'id';
    protected $fillable = [
    'home_id',
    'name',
    'designation',
    'quote'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
