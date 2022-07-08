<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentsDetails extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'equipments_details';
    protected $primaryKey = 'id';
    protected $fillable = [
    'equipments_image',
    'equipments_header',
    'equipments_content',
    'equipments_details',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
