<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeName extends Model
{
    public $primaryKey = 'code_id';
    protected $fillable = ['code_id','name','active'];   

    protected $casts = ['id' => "string"];
}
