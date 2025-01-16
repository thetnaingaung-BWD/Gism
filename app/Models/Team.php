<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=['name','address','subject_id','class_id','ph_no','profile_img','role'];
}
