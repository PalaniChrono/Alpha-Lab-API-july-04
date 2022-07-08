<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonyLab extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'testimony_lab';
    protected $primaryKey = 'id';
    protected $fillable = [
    'testimony_header',
    'testimony_description',
    'testimony_image',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
