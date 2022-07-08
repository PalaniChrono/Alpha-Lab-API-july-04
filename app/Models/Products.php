<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
    'product_banner',
    'product_banner_2',
    'one_left_heading',
    'one_left_content',    
    'one_right_heading',
    'one_right_content',
    'one_left_logo_1',
    'one_left_logo_2',
    'one_left_logo_3',
    'one_left_logo_4',
    'one_left_logo_5',
    'one_left_logo_6',
    'one_right_logo_1',
    'one_right_logo_2',
    'one_right_logo_3',
    'one_right_logo_4',
    'one_right_logo_5',
    'one_right_logo_6',
    'two_header',
    'two_image',
    'two_content'
    ];
    protected $hidden = ['created_at', 'updated_at'];

}
