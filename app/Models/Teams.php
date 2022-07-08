<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $fillable = [
    'company_id',
    'name',
    'designation',
    'profile_image'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function teams() {
        return $this->hasMany('App\Models\Teams','company_id','id');
    }
}
