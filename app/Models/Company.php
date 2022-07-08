<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'company';
    protected $primaryKey = 'id';
    protected $fillable = [
    'banner',
    'header',
    'content',    
    'video_header',
    'video_url'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function teams() {
        return $this->hasMany('App\Models\Teams','company_id','id');
    }
}
