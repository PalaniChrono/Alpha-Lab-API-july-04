<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'home';
    protected $primaryKey = 'id';
    protected $fillable = [
    'banner_one',
    'banner_two',
    'banner_three',
    'banner_four',
    'one_header',
    'one_box_one_count',    
    'one_box_one_label',
    'one_box_two_count',
    'one_box_two_label',
    'one_box_three_count',
    'one_box_three_label',
    'home_eqp_txt_one',
    'home_eqp_txt_two', 
    'home_eqp_txt_three',
    'home_eqp_txt_four',
    'home_eqp_txt_five',
    'home_eqp_img_one',
    'home_eqp_img_two',
    'home_eqp_img_three',
    'home_eqp_img_four',
    'home_eqp_img_five',
    'two_logo_6',
    'two_logo_7',
    'two_logo_8',
    'two_logo_9',
    'two_logo_10',
    'three_header',
    'testimony_id'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function testimonies() {
        return $this->hasMany('App\Models\Testimonies','home_id','id');
    }
}
