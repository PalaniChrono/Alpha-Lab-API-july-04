<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'social_media';
    protected $primaryKey = 'id';
    protected $fillable = [
    'email_link',
    'instagram_link',
    'facebook_link',
    ];
    protected $hidden = ['created_at', 'updated_at'];

}
