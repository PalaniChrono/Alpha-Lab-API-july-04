<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicesModel extends Model
{
    use HasFactory;



    public $timestamps = false;
    protected $table = 'services';
    protected $primarykey = 'id';
    protected $fillable = [
        'services1_img',
        'services1_text',
        'services2_img',
        'services2_text',
        'services3_img',
       'services3_text',
        'services4_img',
        'services4_text',
        'services5_img',
        'services5_text',
       'services6_img',
       'services6_text',
       'services7_img',
       'services7_text',
        'services8_img',
        'services8_text',
        'services9_img',
        'services9_text	',
        'services10_img',
        'services10_text',

    ];
}
