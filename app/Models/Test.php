<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'test';
    protected $primaryKey = 'id';
    protected $fillable = [
    'test_image',
    'test_name',
    'test_details',
    'test_points',
    ];
    protected $hidden = ['created_at', 'updated_at'];

}
