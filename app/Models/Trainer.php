<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'trainers';
    protected $primaryKey = 'id';
    protected $fillable = [
    'PThree_SecOne_Img',
    'PThree_SecOne_Txt',
    'PThree_SecTwo_Txt',
    'PThree_SecThree_Txt'
   
];
}
