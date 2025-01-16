<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable=['name','email','TH_ph','MM_ph','HEC','CON','program_id','remark','mail_type','address','subject'];
}
