<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'organization';
    protected $primaryKey = 'id';
    protected $fillable = [
    'header',
    'logo',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
