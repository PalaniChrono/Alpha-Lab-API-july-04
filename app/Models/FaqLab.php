<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqLab extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'faq_lab';
    protected $primaryKey = 'id';
    protected $fillable = [
    'header',
    'header_answer',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
