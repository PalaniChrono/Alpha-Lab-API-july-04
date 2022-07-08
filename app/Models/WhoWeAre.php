<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoWeAre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'who_we_are';
    protected $primaryKey = 'id';
    protected $fillable = [
    'header',
    'description',
    'image',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
