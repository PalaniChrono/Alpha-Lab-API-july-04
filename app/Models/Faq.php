<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = 'faq_details';
      protected $primaryKey = 'id';
     protected $fillable = [
        'type',
        'header',
        'content',
    ];
    
    protected $hidden = ['created_at', 'updated_at'];
}

