<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'home_banner';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'banner_name',
    'banner_image',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
