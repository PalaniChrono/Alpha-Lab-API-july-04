<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherCourse extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'other_courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'PTwo_SecOne_TxtOne',
        'PTwo_SecOne_TxtTwo',
        'PTwo_SecOne_TxtThree',
        'PTwo_SecOne_TxtFour',
        'PTwo_SecOne_TxtFive',
        'PTwo_SecOne_Img',

        'PTwo_SecTwo_Img',
        'PTwo_SecTwo_TxtOne',
        'PTwo_SecTwo_TxtTwo',
        'PTwo_SecTwo_TxtThree',
        'PTwo_SecTwo_TxtFour',

        'PTwo_SecThree_TxtOne',
        'PTwo_SecThree_TxtTwo',
        'PTwo_SecThree_TxtThree',
        'PTwo_SecThree_Img',

        'PTwo_SecFour_Img',
        'PTwo_SecFour_TxtOne',
        'PTwo_SecFour_TxtTwo',
        'PTwo_SecFour_TxtThree',
        
        'PTwo_SecFive_Policy',
        'MoreOne_SecOne',
        'MoreOne_SecTwo_TxtOne',
        'MoreOne_SecTwo_ColOne',
        'MoreOne_SecTwo_ColTwo',
        'MoreOne_SecTwo_ColThree',
        'MoreOne_SecThree_Txt',
        'MoreOne_SecThree_Img',
        'MoreTwo_SecOne',
        'MoreTwo_SecTwo_TxtOne',
        'MoreTwo_SecTwo_ColOne',
        'MoreTwo_SecTwo_ColTwo',
        'MoreTwo_SecTwo_ColThree',
        'MoreTwo_SecThree_Txt',
        'MoreTwo_SecThree_Img',

        'MoreThree_SecOne',
        'MoreThree_SecTwo',
        'MoreThree_SecThree_Txt',
        'MoreThree_SecThree_Img',
        'MoreFour_SecOne',
        'MoreFour_SecTwo',
        'MoreFour_SecThree_Txt',
        'MoreFour_SecThree_Img'
        
       
        
        ];
}
