<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['description','class_id','program_id','subject_img','teacher_id'];
}
