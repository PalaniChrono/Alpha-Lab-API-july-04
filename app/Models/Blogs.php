<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $fillable = [
    'spot_light_banner',
    'header',
    'content',
    'details_content',
    'spot_light_date'
    ];
    protected $hidden = ['created_at', 'updated_at'];

  
}
