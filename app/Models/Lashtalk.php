<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lashtalk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'lashtalks';
    protected $primaryKey = 'id';
    protected $fillable = [
    'PFour_SecOne_TxtOne',
    'PFour_SecOne_TxtTwo',
    'PFour_SecTwo_TxtOne',
    'PFour_SecTwo_TxtTwo',
    'PFour_SecThree_TxtOne',
    'PFour_SecThree_TxtTwo'
    
    
   
    ];

           
}
