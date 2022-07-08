<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'question';
    protected $primaryKey = 'id';
    protected $fillable = [
    'question',
    'question_answer',
    'active_status',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
