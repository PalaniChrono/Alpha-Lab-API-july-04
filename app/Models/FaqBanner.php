<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqBanner extends Model
{
    use HasFactory;
    protected $table = 'faq_banner';
    protected $primaryKey = 'id';
    protected $fillable = [
    'banner_one',
    'banner_two',
    'banner_three',
    'banner_four',    
    'banner_five'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
