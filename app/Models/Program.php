<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable=['teacher_id','student_count','description','program_img','fees'];
}
